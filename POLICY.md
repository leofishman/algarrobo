# Política de Algarrobo — borrador v0

> Esto es lo que lee el jurado. Lo que no esté acá no se puede exigir en una disputa. Cambiarla después de publicar la lista requiere una lista nueva, así que vale la pena discutirla antes.

## 1. Qué es una entrada

Una entrada describe **un dominio** (ej. `example.com`) con:

| Campo | Contenido |
|---|---|
| `domain` | Dominio registrable, sin subdominios salvo que sean un medio aparte |
| `name` | Nombre del medio |
| `incidents` | Lista de incidentes documentados (ver §3), cada uno con su evidencia |
| `lean_reports` | Informes de tendencia (ver §4), cada uno con su método |
| `owner` | Propietario o financiador principal, con fuente pública |

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

- Se impugna una entrada o un incidente concreto, citando qué sección de esta política no cumple.
- Depósitos: a definir (ver HANDOFF, preguntas abiertas). Más altos para impugnar entradas con muchas impugnaciones previas.
- Corte: la Curation Court de Kleros (voto oculto en Gnosis), a confirmar.

## 7. Licencia

Todo lo que entra a la lista es CC0. Quien envía declara que tiene derecho a publicarlo así; la evidencia de terceros se cita por enlace y archivo, no se copia.
