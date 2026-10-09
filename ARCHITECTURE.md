# Arquitectura — Algarrobo

> Decidido 2026-10-09. La cadena es la verdad; Drupal es la interfaz.

```
1. Verdad       Light Curate en Gnosis · ítems JSON en IPFS · disputas en la Curation Court
                        │  subgraph (gtcr-subgraph, entidad LItem)
2. Exportación  data/*.json en git, CC0 · lo que leen los consumidores
                        │
3. Interfaz     Drupal: usuarios, permisos, medios, incidentes, evidencia, flujo de revisión
                        │
4. Consumo      módulo factcheck, investigadores, Cite Unseen: leen la capa 2
```

**Regla:** si Drupal se cae, la lista y la exportación siguen funcionando. Drupal lee la cadena, nunca la reemplaza.

## Capa 1 — Verdad

- Un ítem = un incidente (POLICY §1). El id es el hash del contenido y no se edita.
- Lectura: `litems` del subgraph [`kleros/gtcr-subgraph`](https://github.com/kleros/gtcr-subgraph) (deploy `legacy-curate-gnosis` en The Graph Studio y Goldsky). Estado del ítem: `Absent`, `RegistrationRequested`, `Registered`, `ClearingRequested`. **Endpoint vivo sin probar.**

## Capa 2 — Exportación

Un script que lee el subgraph y escribe `data/*.json` en git. No depende de Drupal. El chequeo verifica que devuelva incidentes con evidencia, no solo que responda (Quebracho Way 10). **No escrito.**

## Capa 3 — Drupal (`drupal/`)

En git van solo `composer.json`/`.lock`, `config/sync`, `settings.php`, `.ddev/config.yaml` y `scripts/`. Para levantarlo:

```bash
cd drupal && ddev start && ddev composer install
ddev drush site:install --existing-config -y
ddev drush php:script scripts/check-workflow.php   # flujo y permisos
```

Modelo (Drupal 11.4, solo core):

| Tipo | Campos |
|---|---|
| `medio` | `field_qid`, `field_domain` (varios) |
| `evidencia` | `field_url`, `field_level` (1–4), `field_archive_url`, `field_ipfs_cid`, `field_sha256` |
| `incidente` | `field_medio`, `field_incident_type`, `field_publication_url`, `field_publication_date`, `field_claim`, `field_evidencia` (varias) + escritos solo por la sincronización: `field_item_id`, `field_ipfs_uri`, `field_chain_status` |

Flujo `algarrobo` (solo incidentes): Borrador → En revisión → **Listo para enviar**. Roles: `contributor` crea y manda a revisión; `reviewer` aprueba o devuelve. "Listo para enviar" no significa que esté en la lista: eso lo dice `field_chain_status`.

Decisiones:
- **Medio y evidencia no pasan por moderación.** El selector de referencias de Drupal no ofrece nodos sin publicar a quien no tiene `bypass node access`, así que un colaborador no podría usar sus propios borradores. Se revisan junto con el incidente.
- **Anónimos no ven nada.** Es un taller con login. La vista pública sale de la capa 2, como sitio estático, fuera de SER5.
- **Drupal no firma.** El envío lleva depósito y se firma con la wallet de quien envía, en el navegador. Drupal arma el JSON y lo sube a IPFS. Si Drupal guardara claves, sería el punto único a capturar y el operador respondería por cada envío.

## Pendiente, en orden

1. Script de evidencia: Wayback + IPFS + SHA-256 (Queue API de Drupal o script suelto; la primera vez a mano, la segunda se scriptea).
2. Generar el JSON del ítem desde un incidente aprobado, en el formato de columnas de Light Curate.
3. Sincronización: cron que lee `litems` y actualiza `field_chain_status`, e importa incidentes enviados fuera de Drupal.
4. Firma en el navegador (wallet), o enlace al frontend de Curate mientras tanto.
5. Exportación (capa 2) y vidriera estática.
