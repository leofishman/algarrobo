# AGENTS — Algarrobo

> Leer en este orden: `~/Proyects/Quebracho/CONTEXT.md` → `~/Proyects/Quebracho/AGENTS.md` (reglas de agentes: evidencia antes de afirmar, ejecutar > instruir) → `HANDOFF.md` de este repo.
> Español, directo. Proyecto independiente de Drupal: no traer contexto de `ai_provider_universal` salvo lo que dice HANDOFF.

## Método: Quebracho Way

Este proyecto se construye según el **Quebracho Way** (`~/Proyects/Quebracho/docs/quebracho_way.md`, el cómo) dentro de **fundamentos** (`~/Proyects/Quebracho/docs/fundamentos.md`, el porqué). Ante un conflicto, manda lo que dicen esos documentos; acá solo está cómo se aplican a Algarrobo. No copiar doctrina a este repo: enlazarla.

| Principio | En Algarrobo |
|---|---|
| Selección: libre, gobernanza abierta, maduro | Kleros Curate (MIT, gobernanza por PNK) y Reality.eth se evalúan contra estos criterios antes de adoptarlos, no se asumen. Datos CC0. |
| 2. Reusar la documentación | `POLICY.md` y `HANDOFF.md` son la fuente de verdad. Si quedaron viejos, se actualizan antes de seguir. |
| 3. Secretos en su lugar | Claves de wallets y de APIs en Vaultwarden. Nunca en el repo, ni "de prueba". |
| 4. Construir para durar | La política no se puede cambiar sin crear otra lista: se discute antes de publicar, no después. |
| 5. Probado por sobre propio | Curate y su corte en lugar de contratos propios; identidad por QID de Wikidata; **sin token propio** (lección Civil, ver `PRIOR-ART.md`). Construir solo la capa que falta: la política y la importación. |
| 6. Reversibilidad | No depender de Kleros: la lista se exporta a JSON plano versionado en git, y la salida a otro mecanismo de arbitraje queda escrita antes del lanzamiento. |
| 7. Backups antes de promover | Toda evidencia archivada en dos lugares (Wayback/archive.today + IPFS fijado) con hash. Sin restore probado de la exportación, no se lanza. |
| 8. Ejecución por sobre documentos | Con la política en v1, lo siguiente es sembrar entradas reales, no pulir documentos. |
| 10. Monitorear la función | Si hay API o exportación, el chequeo verifica que devuelva entradas con evidencia, no solo un 200. |
| 11. Lo que se repite se scriptea | La segunda vez que se arma una entrada o un archivo de evidencia a mano, se extrae un script. |
| Línea roja 5 / fundamentos 6 | No afirmar lo que no se verificó. Vale para el código y para el registro: una calificación sin evidencia no entra, aunque coincida con lo que pensamos. |

## Conocimiento del proyecto: kenkeep

kenkeep (`.ai/kenkeep/`) captura lo aprendido en cada sesión y lo inyecta al empezar la siguiente. Al cerrar una sesión productiva: `/kk-session-extract`, o `/kk-curate` cuando se acumulen sesiones. Los nodos se revisan con `git diff` y se aceptan commiteando. Los hooks (`.ai/kenkeep/hooks/`) no se versionan: en un clon nuevo, `npx kenkeep init --harnesses claude`.

<!-- >>> kenkeep:kk-index >>> -->
You are required to load [.ai/kenkeep/ENTRY.md](.ai/kenkeep/ENTRY.md), the small curated entry catalog for this repo. Enter there and descend using progressive disclosure principles.

> kenkeep navigation: the injected body above is the root index node, the top-level catalog of branches and root-level leaves. Do not expect the whole knowledge base here; descend on demand. Read the root index node, pick one or more branches whose intent and tags match your task (several branches can be relevant), and read those branch `index.md` nodes. Descend further only where the task needs it, opening only the leaves you have confirmed are relevant. Follow each leaf's `relates_to` and `depends_on` cross edges to reach related leaves in other branches. You decide how deep to go per branch.
<!-- <<< kenkeep:kk-index <<< -->
