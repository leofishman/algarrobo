<?php
// Chequeo del flujo editorial y los permisos. Correr: ddev drush php:script scripts/check-workflow.php
// Crea datos de prueba y los borra al final.
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;

function check($cond, $msg) {
  if (!$cond) {
    throw new \RuntimeException("FALLA: $msg");
  }
  echo "ok: $msg\n";
}

$sw = \Drupal::service('account_switcher');
$c = User::create(['name' => 'check_contrib', 'status' => 1, 'roles' => ['contributor']]);
$c->save();
$r = User::create(['name' => 'check_rev', 'status' => 1, 'roles' => ['reviewer']]);
$r->save();
$valid = fn($n) => count($n->validate()) === 0;

try {
  $sw->switchTo($c);
  $m = Node::create(['type' => 'medio', 'title' => 'M', 'field_qid' => 'Q0', 'field_domain' => ['example.com'], 'uid' => $c->id()]);
  $m->save();
  $e = Node::create(['type' => 'evidencia', 'title' => 'E', 'field_url' => 'https://example.com/f', 'field_level' => 2, 'uid' => $c->id()]);
  $e->save();
  $i = Node::create([
    'type' => 'incidente', 'title' => 'I', 'uid' => $c->id(),
    'field_medio' => $m->id(), 'field_incident_type' => 'correction',
    'field_publication_url' => 'https://example.com/n', 'field_publication_date' => '2023-10-23',
    'field_claim' => 'x', 'field_evidencia' => [$e->id()],
  ]);
  check($valid($i), 'colaborador crea incidente con su medio y evidencia');
  $i->save();
  check($i->moderation_state->value === 'draft' && !$i->isPublished(), 'arranca en borrador sin publicar');
  $i->set('moderation_state', 'review');
  check($valid($i), 'colaborador manda a revisión');
  $i->save();
  $i->set('moderation_state', 'published');
  check(!$valid($i), 'colaborador no puede aprobar');
  $sw->switchBack();

  $sw->switchTo($r);
  $i = Node::load($i->id());
  $i->set('moderation_state', 'published');
  check($valid($i), 'revisor aprueba');
  $i->save();
  $sw->switchBack();

  check(!$i->access('view', User::getAnonymousUser()), 'anónimo no ve nada');
}
finally {
  foreach ([$i ?? NULL, $e ?? NULL, $m ?? NULL, $c, $r] as $x) {
    $x?->delete();
  }
}
