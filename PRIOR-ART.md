# Antecedentes — qué existe parecido a Algarrobo

> Relevado 2026-10-09. Ninguno combina las tres cosas de Algarrobo: datos abiertos (CC0), calificación basada en incidentes con evidencia archivada, e impugnación con costo resuelta por reglas públicas.

## Lo más cercano

| Proyecto | Qué hace | Abierto | Basado en evidencia | Impugnable | Lección |
|---|---|---|---|---|---|
| [Wikipedia RSP](https://en.wikipedia.org/wiki/Wikipedia:Reliable_sources/Perennial_sources) (desde 2018) | Lista de fuentes con etiqueta de confiabilidad (confiable, sin consenso, despreciada…) por consenso de editores | CC BY-SA (no CC0; no compatible con GPLv2) | No: consenso de discusión, enlazado | Sí, reabriendo la discusión en el noticeboard | Clasifica NYT y Al Jazeera como "generally reliable". Críticas propias: poco tráfico, ~cientos de fuentes, sesgo contra medios fuera de EE. UU., se cree al editor sobre su palabra ([Cite Unseen](https://meta.wikimedia.org/wiki/Cite_Unseen)). El consenso solo no alcanza. |
| [Wikidata WikiProject Source Reliability](https://www.wikidata.org/wiki/Wikidata:WikiProject_Source_Reliability) ("WD:CRAP") | Quiere modelar en Wikidata "assessed source reliability / bias" con calificadores "según quién" y fecha | **CC0** | Solo agrega evaluaciones de terceros (MBFC, AllSides, Ad Fontes, Iffy) | Edición wiki | **Las propiedades siguen propuestas, no creadas** (última edición abril 2026, 11 participantes). Existe [P9852 Media Bias/Fact Check ID](https://www.wikidata.org/wiki/Property:P9852) (~2.880 registros): enlaza, no califica. Es la capa de identidad natural para Algarrobo: usar el QID de Wikidata como id del medio. |
| [Cite Unseen](https://github.com/KevinPayravi/Cite-Unseen) | Script que marca las citas de Wikipedia por tipo y confiabilidad, a partir de listas de varias Wikipedias | Listas en Meta-Wiki | No | — | Muestra la demanda: consumidores que solo necesitan una lista legible por máquina. |
| [Civil](https://www.cjr.org/the_media_today/civil-token-sale.php) (2018–2020) | **Token-curated registry de redacciones** con una "Constitución" de estándares | Sí | Reglas escritas, juicio comunitario | Sí, con token CVL | **El antecedente más parecido, y fracasó.** La venta de tokens juntó ~USD 1,4 M de 8 M; exigía un examen de blockchain para comprar. Su propio diagnóstico: "dejamos que la tecnología tapara el mensaje". Lección: la cripto tiene que quedar invisible para quien consulta y casi invisible para quien aporta, y no hace falta token propio. |
| [Kleros: "Can Kleros fight fake news?"](https://blog.kleros.io/can-kleros-fight-fake-news/) (2018) | Propone una subcorte de noticias falsas y listas curadas por idioma y tema | — | — | — | Nunca se lanzó. El caso de uso está en su propio blog ([Curate](https://blog.kleros.io/kleros-curate-announcement/) también pone de ejemplo un registro de medios): argumento para el pitch. |
| [Journalism Trust Initiative](https://journalismtrustinitiative.org/about-jti/) (RSF, norma CEN CWA 17493) | Certificación de procesos editoriales (18 criterios), autoevaluación + auditoría | Norma pública; listado de certificados en su sitio | Sí, de procesos (no de lo publicado) | No | Complementario: una certificación JTI puede ser un incidente positivo. Mide si el medio tiene política de correcciones, no si la cumple. |
| [Internet Standing / Web Jury](https://www.web-jury.com/blog/how-to-verify-news-credibility-2026) (2026) | Votos de lectores ponderados por historial, histogramas en vez de promedios, suavizado temporal contra campañas | "API and open data", licencia no clara | No: opinión ponderada | Votando | Buenas ideas anti-manipulación para la parte de **tendencia** (histograma, suavizado). ~500 cuentas. |
| [PressGrade](https://pressgrade.io/scores/reuters) | Puntajes 0–100 "evidence-based" (Reuters 75) | No: metodología completa tras registro pago | Dice serlo, no lo muestra | No | Lo que Algarrobo quiere no ser: "basado en evidencia" que no se puede ver. |

## Propietarios (contraejemplos)

MBFC, NewsGuard, AllSides, Ad Fontes, Ground News: metodología declarada, datos cerrados o con licencia restrictiva, sin impugnación con reglas.

## Qué cambia en el diseño

1. **Identidad = Wikidata QID.** No inventar ids; enlaza con todo lo demás gratis.
2. **Proponer a Wikidata** (vía WD:CRAP) una propiedad tipo "Algarrobo ID", como existe la de MBFC, para que la lista sea encontrable desde Wikipedia.
3. **Sin token propio y sin cripto visible** para quien consulta (lección Civil). Lectura por API/JSON plano; la cadena solo para disputas.
4. **Tendencia con las técnicas de Web Jury** (histograma, suavizado), seriedad con incidentes (lo que nadie hace).
5. **Pitch a Kleros:** el caso lo propusieron ellos en 2018 y nunca se hizo.
