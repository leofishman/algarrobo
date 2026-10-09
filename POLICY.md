# Política de Algarrobo — borrador v0

> Esto es lo que lee el jurado. Lo que no esté acá no se puede exigir en una disputa. Cambiarla después de publicar la lista requiere una lista nueva, así que vale la pena discutirla antes.

## 1. Qué es una entrada

**Una entrada es un incidente, no un medio.** En Light Curate el id de un ítem es el hash de su contenido y no existe la edición (`LightGeneralizedTCR.sol`, `addItem`: `itemID = keccak256(_item)`; solo hay agregar, quitar e impugnar). Un medio con una lista de incidentes que crece obligaría a quitar y volver a enviar la entrada entera, con depósito y plazo de impugnación, cada vez que aparece un incidente. Por eso cada incidente es su propio ítem y el medio se arma en el consumidor agrupando por QID.

Campos de un incidente:

| Campo | Contenido |
|---|---|
| `outlet_qid` | QID de Wikidata del medio (ej. `Q9684`). Es la identidad; si el medio no tiene QID, se crea antes en Wikidata |
| `domain` | Dominio registrable donde se publicó, sin subdominios salvo que sean un medio aparte |
| `type` | `false` · `correction` · `omission` · `sanction` (ver §3) |
| `publication_url` | La publicación concreta |
| `date` | Fecha de la publicación (y de la corrección o el fallo si aplica) |
| `claim` | Qué se publicó, en una frase, sin adjetivos |
| `evidence` | Una o más piezas: URL, nivel (§3, 1–4), URL archivada, SHA-256 del archivo |

Tendencia (§4) y propietario van en **listas aparte** con el mismo criterio: un ítem por informe, un ítem por dato de propiedad con fuente.

La entrada **no** lleva un puntaje de seriedad. El puntaje lo calcula cada consumidor a partir de los incidentes, con una fórmula pública. Así la lista guarda hechos y la opinión queda del lado de quien la usa.

## 2. Principio

Se acepta lo que un tercero puede **verificar repitiendo un método**, no lo que alguien cree. Una entrada o un incidente que la evidencia sostiene se queda aunque incomode a cualquiera, incluidos quienes crearon la lista.

## 3. Incidentes (seriedad)

Un incidente es un hecho concreto sobre una publicación concreta:

- **Publicó algo falso** y quedó demostrado.
- **Corrigió o se retractó** (cuenta a favor si fue visible y a tiempo, en contra si fue escondida o tardía).
- **Omitió un dato material** que conocía o debía conocer (ej. un vínculo del entrevistado con una parte), demostrado con fuentes de la fecha.
- **Fue sancionado** por un regulador o condenado por un tribunal.

### Jerarquía de evidencia (de más a menos fuerte)

1. **Sentencia firme** de un tribunal o resolución de un regulador (Ofcom, defensorías, consejos de prensa) sobre esa publicación.
2. **Reconocimiento del propio medio:** fe de erratas, corrección, revisión interna publicada.
3. **Documentos primarios** que contradicen lo publicado: grabaciones completas, documentos oficiales, datos originales.
4. **Verificación reproducible:** geolocalización o cronolocalización con pasos repetibles, recálculo estadístico con datos y código públicos, procedencia de imágenes (C2PA, metadatos, búsqueda inversa con fecha).

**No son evidencia:** juicios en curso, artículos de opinión, informes de organizaciones de defensa de una postura (de cualquier lado) salvo por las fuentes primarias que citen, capturas sin archivo verificable.

### Archivo obligatorio

Toda evidencia se presenta con una copia archivada (Wayback Machine, archive.today o IPFS) y su hash SHA-256. Un enlace que puede desaparecer no alcanza.

## 4. Tendencia

La tendencia es opinión informada, así que no se vota como verdad única:

- Cada `lean_report` dice **quién** lo hace, **con qué método** (análisis de contenido con muestra y codificación públicas, comparación de cobertura de un mismo hecho, etc.) y **sobre qué período**.
- La lista muestra la **distribución** de informes, no un promedio.
- Se impugna un informe por su método (muestra sesgada, codificación no reproducible), no por su resultado.

## 5. Hechos verificables por oráculo

Las preguntas cerradas sobre hechos ("¿el medio X publicó una corrección de la nota Y antes del día Z?", "¿el tribunal T falló contra X en la causa C?") pueden resolverse con un oráculo optimista (Reality.eth, con Kleros como árbitro de apelación) antes de entrar a la lista. La pregunta tiene que nombrar el método que la resuelve. Las preguntas de valoración ("¿X es serio?") no van al oráculo.

## 6. Disputas

- Se impugna un incidente concreto, citando qué sección de esta política no cumple.
- Un incidente que ya está en la lista (misma publicación, mismo `type`) se impugna por duplicado aunque el texto difiera: el contrato no lo detecta porque el id es el hash del contenido.
- Depósitos: a definir (ver HANDOFF, preguntas abiertas). Más altos para impugnar entradas con muchas impugnaciones previas.
- Corte: la Curation Court de Kleros en Gnosis, con voto oculto desde KIP-87 (completado según la actualización de julio de 2026). Falta confirmar que una lista nueva de terceros pueda usarla (ver HANDOFF).

## 7. Licencia

Todo lo que entra a la lista es CC0. Quien envía declara que tiene derecho a publicarlo así; la evidencia de terceros se cita por enlace y archivo, no se copia.
