# Algarrobo

> Nombre de trabajo (madera nativa reservada en `docs/marca_naming.md`). No es marca.

Registro abierto de la seriedad y la tendencia de medios y sitios de información, donde cada calificación se sostiene con evidencia verificable y cualquiera puede impugnarla. Los datos son CC0: cualquier sitio, herramienta o investigador los usa sin pedir permiso.

- **Por qué:** las bases existentes (MBFC, NewsGuard, AllSides, Ad Fontes) son propietarias, no dicen de dónde sale cada puntaje y piden confiar en su criterio. Algarrobo pide confiar en la evidencia, que está a la vista.
- **Cómo:** una lista curada en [Kleros Curate](https://curate.kleros.io). Proponer o impugnar una entrada exige un depósito; si hay disputa, decide un jurado sorteado según una política pública ([POLICY.md](POLICY.md)). El que pierde, pierde el depósito.
- **Estado:** política en borrador y la interfaz Drupal con el modelo de datos (`drupal/`). Sin lista creada. Ver [ARCHITECTURE.md](ARCHITECTURE.md).

| Archivo | Qué es |
|---|---|
| [ARCHITECTURE.md](ARCHITECTURE.md) | Capas, stack y qué hace Drupal |
| [POLICY.md](POLICY.md) | Borrador v0 de la política: qué es una entrada y qué cuenta como evidencia |
| [PRIOR-ART.md](PRIOR-ART.md) | Qué existe parecido y qué cambia en el diseño |
| [AGENTS.md](AGENTS.md) | Reglas para agentes: Quebracho Way aplicado y kenkeep |

## Licencia

- **Datos y documentos** (la lista, `data/`, POLICY, ARCHITECTURE y el resto de los `.md`): [CC0 1.0](LICENSE-DATA). Se usan sin pedir permiso ni citar.
- **Código** (`drupal/`, scripts): [GPL-2.0-or-later](LICENSE), la misma que Drupal.
