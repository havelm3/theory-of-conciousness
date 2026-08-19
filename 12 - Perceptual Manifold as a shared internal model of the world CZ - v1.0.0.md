# 12. Perceptual Manifold jako sdílený interní model světa

## 12.1 Od jednotlivého perceptu k vnitřnímu světu

Předchozí kapitoly pracovaly převážně s jednotlivými metastabilními
perceptuálními stavy:

```
M_A,
M_B,
M_C.
```

To však stále nestačí k popisu kontinuální zkušenosti.

Organismus nevnímá pouze izolované objekty nebo vlastnosti.

V jednom okamžiku může současně existovat dynamická reprezentace:

```
prostoru,
objektů,
pohybu,
vlastního těla,
zvuků,
očekávání,
relevance,
možných akcí.
```

Dynamic Perceptual State Hypothesis proto zavádí širší objekt:

```
Perceptual Manifold.
```

Ten představuje průběžně existující strukturu interního stavového
prostoru, ve které jsou jednotlivé perceptuální stavy vzájemně propojeny.


## 12.2 Perceptual Manifold není obraz

Perceptual Manifold není chápán jako interní bitmapa nebo přesná kopie
senzorického vstupu.

Není to:

```
internal screen.
```

Je to dynamická reprezentace vztahů.

Například objekt může být reprezentován současně prostřednictvím:

```
identity,
position,
motion,
relation to body,
behavioral relevance,
predicted continuation.
```

Proto je vhodnější chápat manifold jako:

```
structured dynamic state
```

než jako:

```
reconstructed image.
```


## 12.3 Interní model není totožný s vnějším světem

Perceptual Manifold není svět.

Je interní dynamickou konstrukcí systému.

Formálně:

```
World(t)
    ->
sensory channels
    ->
neural dynamics
    ->
P(t),
```

kde:

```
P(t) != World(t).
```

`P(t)` je pouze stav, který umožňuje systému efektivně predikovat,
interpretovat a ovlivňovat svět.


## 12.4 Funkční adekvátnost místo úplné rekonstrukce

Interní model nemusí obsahovat všechny fyzikální vlastnosti prostředí.

Stačí, pokud obsahuje strukturu relevantní pro:

```
prediction,
action,
memory,
valuation,
planning.
```

DPSH proto nepředpokládá:

```
perfect world reconstruction.
```

Předpokládá:

```
functionally adequate internal model.
```


## 12.5 Dynamická struktura

Perceptual Manifold lze pracovně reprezentovat:

```
P(t) =
    {
        active perceptual regions,
        latent states,
        phase relations,
        transition probabilities,
        predictions,
        learned constraints
    }.
```

Tento objekt není explicitně uložen na jednom místě.

Je výsledkem společné dynamiky celé relevantní sítě.


## 12.6 Sdílený interní stav

Klíčová hypotéza této kapitoly je:

> Více funkčních subsystémů může pracovat nad různými projekcemi stejného
> interního dynamického stavu, místo aby každý modul vytvářel vlastní
> nezávislou rekonstrukci světa.

Schematicky:

```
sensory systems
      |
      v
Perceptual Manifold
      |
+-----+-----+------+-------+-------+
|           |      |       |       |
v           v      v       v       v
```

memory      action  value  language planning.


## 12.7 Projekce místo kopie

Každý modul nepotřebuje celý stav:

```
P(t).
```

Může získávat pouze funkčně relevantní projekci:

```
O_i(t) = G_i(P(t)).
```

Například:

### Motorický modul

```
O_motor =
    {
        reachable,
        direction,
        obstacle,
        movement opportunity
    }.
```

### Jazykový modul

```
O_language =
    {
        object identity,
        relational concepts,
        symbolic labels
    }.
```

### Hodnoticí modul

```
O_value =
    {
        threat,
        reward,
        salience
    }.
```

Různé moduly tedy čtou různé vlastnosti stejné interní dynamiky.


## 12.8 Jedna reprezentace, mnoho observables

Tím vzniká analogie:

```
one underlying state
    ->
multiple observables.
```

Stejný interní stav může být z pohledu různých modulů interpretován
odlišně.

Například objekt:

```
apple
```

může být současně:

```
red,
edible,
reachable,
familiar,
named "apple".
```

Nemusí existovat pět nezávislých světů.

Může existovat jedna distribuovaná struktura s více funkčními projekcemi.


## 12.9 Perceptual Manifold jako referenční rámec

Pokud více subsystémů používá stejný interní stav, mohou sdílet referenci.

Například:

```
visual system:
    object A is left of object B

motor system:
    move hand toward A

language system:
    "the object on the left"
```

Všechny tyto operace mohou být ukotveny ve stejné relační struktuře.


## 12.10 Relační reprezentace

DPSH proto předpokládá, že důležitější než izolované vlastnosti jsou
vztahy:

```
A left_of B,
A moving_toward B,
A occludes B,
hand near A,
A predicts B.
```

Perceptual Manifold může být bohatý právě tím, že uchovává síť těchto
dynamických vztahů.


## 12.11 Prostor jako vztah

Prostorová reprezentace nemusí být nutně explicitní kartézská mapa.

Může vznikat z relačních struktur:

```
near,
far,
left,
right,
above,
behind,
reachable.
```

Globální prostorový percept může být emergentní geometrií těchto vztahů.


## 12.12 Čas jako vztah

Stejně tak čas nemusí být uložen pouze jako:

```
timestamp.
```

Může být reprezentován:

```
before,
after,
expected next,
duration,
phase relation.
```

Perceptual Manifold je tedy prostorově-časový dynamický objekt.


## 12.13 Objekt jako stabilní trajektorie vztahů

Objektová identita může být reprezentována kontinuitou dynamických
vztahů.

Například objekt se pohybuje:

```
x1 -> x2 -> x3.
```

Jeho senzorický pattern se mění.

Přesto:

```
identity_relation persists.
```

Objekt může být chápán jako stabilní struktura uvnitř měnícího se
manifold.


## 12.14 Vlastní tělo jako součást manifold

DPSH nepředpokládá ostré oddělení:

```
world representation
```

a:

```
body representation.
```

Vnitřní stav může zahrnovat:

```
body position,
proprioception,
action capability,
interoceptive state.
```

To je důležité, protože akce mění budoucí senzorický vstup.


## 12.15 Egocentrický referenční rámec

Část interního světa může být organizována vzhledem k organismu:

```
left of me,
reachable by me,
approaching me.
```

Taková reprezentace není čistě objektivní mapa.

Je funkčně vztažená k aktuálním možnostem systému.


## 12.16 Affordances

Objekt nemusí být reprezentován pouze otázkou:

```
"co to je?"
```

Může zároveň obsahovat:

```
"co s tím lze dělat?"
```

Například:

```
cup
    ->
graspable,
drinkable,
movable.
```

Affordance může být projekcí stejného perceptuálního stavu do
motorického systému.


## 12.17 Hodnota jako modulace manifold

Hodnoticí systém může měnit dynamickou geometrii:

```
threat
    ->
increased stability / salience.
```

Objekt s vysokou relevance může být:

```
easier to enter,
harder to ignore,
more likely to gain workspace access.
```

Hodnota tedy nemusí být pouze tag připojený k hotovému perceptu.

Může přímo deformovat jeho dynamiku.


## 12.18 Emoční a interoceptivní stav

Podobně může interní stav těla ovlivnit interpretaci stejného prostředí.

Například:

```
hunger
```

může změnit stabilitu reprezentací:

```
food-related states.
```

Perceptual Manifold je proto potenciálně závislý nejen na externích
senzorech, ale i na interních stavech organismu.


## 12.19 Kontext

Stejný objekt:

```
X
```

může být interpretován rozdílně v:

```
context A
```

a:

```
context B.
```

Formálně:

```
M_X(context A)
    !=
M_X(context B).
```

Kontext není externí metadata.

Je součástí současného dynamického stavu.


## 12.20 Kontextová deformace manifold

Kontext může měnit:

```
basin geometry,
transition probabilities,
prediction priors.
```

Tím se některé interpretace stanou:

```
more likely
```

a jiné:

```
less likely.
```


## 12.21 Hierarchie manifoldů

Je možné, že neexistuje pouze jeden homogenní manifold.

Může existovat hierarchie:

```
local sensory manifolds
    ->
regional integrative manifolds
    ->
global perceptual manifold.
```

Například:

```
visual manifold
auditory manifold
body manifold
```

se mohou propojit do širší:

```
multimodal state.
```


## 12.22 Multimodální integrace

Stejný objekt může generovat:

```
visual input,
sound,
touch.
```

Pokud všechny odpovídají stejné externí příčině, interní dynamika může
vytvořit integrovaný stav:

```
M_object.
```

Ten není prostým součtem:

```
visual + audio + touch.
```

Může obsahovat jejich společnou relační strukturu.


## 12.23 Cross-modal prediction

Vizuální stav může predikovat zvuk:

```
falling object
    ->
expected impact sound.
```

Zvuk naopak může změnit vizuální očekávání:

```
sound behind
    ->
orient visual system.
```

Perceptual Manifold tak umožňuje predikce napříč modalitami.


## 12.24 Binding jako společná dynamická kompatibilita

Feature binding nemusí být řešen samostatným:

```
binder.
```

Pokud:

```
color,
position,
motion,
shape
```

vzájemně podporují stejnou dynamickou konfiguraci, mohou se stát
součástí:

```
M_object.
```

Binding pak vzniká jako stabilní kompatibilita v rámci manifold.


## 12.25 Neslučitelné bindingy

Pokud dvě vlastnosti nelze současně stabilizovat v jedné konfiguraci,
síť může vytvořit konkurenci:

```
M_A
M_B.
```

Symmetry breaking následně vybere jednu interpretaci.

Tím se binding propojuje s předchozími mechanismy.


## 12.26 Perceptual Manifold jako prediktivní objekt

Perceptual Manifold nepopisuje pouze:

```
what is.
```

Obsahuje dynamiku:

```
what can happen next.
```

Proto:

```
P(t)
```

implicitně obsahuje:

```
transition model.
```


## 12.27 Vnitřní svět jako generativní struktura

Z aktuálního stavu:

```
P(t)
```

lze generovat očekávání:

```
predicted sensory stream,
predicted object motion,
predicted consequences of action.
```

Vnitřní svět je tedy aktivní generativní model.


## 12.28 Counterfactual dynamics

Silnější architektura může umožnit interně simulovat:

```
what if action A?
```

bez okamžité realizace akce.

Například:

```
P(t)
    ->
simulated transition A
    ->
expected state P_A'.
```

To by umožňovalo plánování.


## 12.29 Simulace není nutná pro základní percept

DPSH však nevyžaduje counterfactual simulation pro základní vznik
perceptuálního stavu.

Je to vyšší funkce, která může být nad manifold postavena později.


## 12.30 Akce mění vnitřní model

Akce:

```
a(t)
```

změní svět:

```
World(t)
    ->
World(t + dt).
```

Tím se změní budoucí senzorický vstup:

```
I(t + dt).
```

Perceptual Manifold je tedy součástí uzavřené smyčky:

```
perception
    ->
action
    ->
world
    ->
new perception.
```


## 12.31 Aktivní percepce

Systém nemusí pouze pasivně čekat na data.

Může provádět akce, které snižují nejistotu:

```
move eyes,
turn head,
approach object.
```

Tím aktivně získává informace potřebné k stabilizaci interního modelu.


## 12.32 Perceptual Manifold a rozhodování

Rozhodování může být chápáno jako výběr akce podle současného
dynamického stavu:

```
action =
    F(P(t), goals, value).
```

Akční systém nemusí dostávat celý sensory stream.

Může pracovat s projekcí manifold.


## 12.33 Intuitivní rozhodování

Pokud zkušenost vytvořila určitou geometrii:

```
P_learned,
```

nový komplexní vstup může rychle přesunout systém do:

```
M_action_A.
```

Akce může být vybrána bez explicitního výpočtu všech důvodů.

Tím se intuice přirozeně propojuje s shared internal model.


## 12.34 Explicitní reasoning

Reasoning může nad manifold provádět pomalejší transformace.

Například:

```
current state
    ->
retrieve memory
    ->
simulate alternative
    ->
modify prediction
    ->
new state.
```

Reasoning tedy nemusí být zdrojem základního perceptu.

Může být mechanismem manipulace s již existujícím interním modelem.


## 12.35 Jazyk jako projekce vnitřního světa

Jazykový systém může převádět části dynamického stavu do symbolů:

```
P(t)
    ->
linguistic representation.
```

Tím získává možnost reportovat obsah perceptu.


## 12.36 Symbol není percept

Slovo:

```
"chair"
```

není totožné s:

```
M_chair.
```

Je pouze jednou projekcí tohoto stavu.

To vysvětluje, proč interní reprezentace může obsahovat výrazně více
informací než slovní report.


## 12.37 Paměť jako vazba na minulý manifold

Paměť může uchovávat:

```
previous states,
compressed trajectories,
synaptic traces.
```

Při vybavení:

```
memory
    ->
current manifold.
```

Vzpomínka tak může znovu aktivovat části dřívější dynamické struktury.


## 12.38 Vzpomínka není nutně přesná rekonstrukce

Protože současný stav:

```
P_now
```

se liší od stavu při původní zkušenosti, reaktivace může být:

```
reconstructive.
```

Vzpomínka může být ovlivněna aktuálním kontextem.


## 12.39 Perceptual Manifold jako pracovní prostor zkušenosti

Z funkčního hlediska lze Perceptual Manifold chápat jako stav, ve kterém
se setkávají:

```
sensory evidence,
memory,
prediction,
valuation,
action possibilities.
```

Neznamená to, že jde o jednu anatomickou oblast.

Je to distribuovaná dynamická struktura.


## 12.40 Rozdíl proti Global Workspace

Perceptual Manifold a Global Workspace nejsou totéž.

Perceptual Manifold:

```
represents and evolves internal world state.
```

Global Workspace:

```
provides broader accessibility to selected content.
```

Pracovní vztah:

```
Perceptual Manifold
    ->
selected state
    ->
Global Workspace
    ->
distributed access.
```


## 12.41 Workspace nemusí přenášet celý manifold

Globální broadcast může obsahovat pouze relevantní část:

```
projection(P).
```

Například:

```
"unexpected moving object on left".
```

Celý interní prostorový model nemusí být globálně rozeslán.


## 12.42 Workspace může manifold zpětně měnit

Po globálním přístupu:

```
workspace
    ->
attention,
memory retrieval,
action,
prediction.
```

Tyto procesy zpětně ovlivní:

```
P(t).
```

Vzniká:

```
P <-> W.
```


## 12.43 Perceptual Manifold a kontinuita subjektu

Silnější, zatím teoretická možnost je, že kontinuita subjektivní
zkušenosti souvisí s tím, že:

```
P(t)
```

nikdy nezačíná z nulového stavu.

Každý nový okamžik vzniká transformací:

```
P(t - dt).
```

Tím vzniká nepřerušená kauzální trajektorie interního světa.


## 12.44 "Stejný svět" jako dynamická invariance

Přestože:

```
P(t1) != P(t2),
```

může existovat vyšší invariance:

```
same scene,
same objects,
same self.
```

Kontinuita zkušenosti může tedy existovat na makroskopické úrovni
navzdory neustálé mikroskopické změně.


## 12.45 Interní perspektiva

Perceptual Manifold není neutrální fyzikální mapa.

Je organizován z perspektivy systému.

Obsahuje vztahy jako:

```
relative to body,
relevant to goals,
reachable,
dangerous,
expected.
```

Proto jde o model:

```
world-for-the-system
```

spíše než:

```
world-in-itself.
```


## 12.46 Totožnost reprezentace napříč moduly

Pokud více modulů pracuje nad stejným stavem, lze testovat, zda různé
výstupy skutečně korelují s jednou latentní strukturou.

Například stav:

```
M_A
```

by měl současně predikovat:

```
motor choice,
verbal label,
memory retrieval,
value response.
```

To poskytuje experimentální test sdíleného interního modelu.


## 12.47 Experiment PM1 – společný latentní stav

Síť dostane komplexní scénu.

Zaznamenáme:

```
global population state.
```

Potom několik modulů provede různé úlohy:

```
classify object,
choose action,
estimate value,
predict next state.
```

Testujeme, zda lze jejich výsledky vysvětlit projekcemi stejného
latentního stavu.


## 12.48 Experiment PM2 – shared-state perturbation

Perturbujeme oblast:

```
M_A.
```

Pokud je skutečně sdíleným základem více funkcí, perturbace by měla
současně změnit více downstream výstupů:

```
action,
report,
prediction.
```

Pokud změní pouze jeden izolovaný modul, může jít spíše o lokální
reprezentaci.


## 12.49 Experiment PM3 – cross-modal completion

Síť se naučí objekt pomocí:

```
vision + sound.
```

Později dostane pouze:

```
partial visual input.
```

Testujeme, zda interní stav generuje očekávání:

```
corresponding sound.
```

To by podporovalo existenci integrované multimodální reprezentace.


## 12.50 Experiment PM4 – occluded object

Objekt se pohybuje a následně je zakryt.

Perceptual Manifold má udržovat:

```
identity,
predicted position,
expected reappearance.
```

Měříme, zda tyto informace mohou využít:

```
motor,
prediction,
report
```

i bez aktuálního vizuálního inputu.


## 12.51 Experiment PM5 – conflicting modalities

Vizuální a auditivní kanál dostanou neslučitelné informace.

Sledujeme:

```
competition,
state formation,
confidence,
workspace access.
```

Tím lze testovat, jak manifold řeší multimodální konflikt.


## 12.52 Experiment PM6 – module removal

Odstraníme jeden downstream modul:

```
language.
```

Pokud Perceptual Manifold existuje nezávisle, měly by zůstat:

```
perception,
action,
prediction.
```

To pomůže oddělit interní stav od jeho konkrétních projekcí.


## 12.53 Experiment PM7 – sensory modality removal

Po multimodálním učení odstraníme:

```
vision
```

nebo:

```
audio.
```

Sledujeme, zda zbývající modalita dokáže aktivovat část společného
manifold.


## 12.54 Experiment PM8 – context-dependent interpretation

Stejný stimulus:

```
X
```

prezentujeme v:

```
context A
context B.
```

Měříme:

```
M_XA
M_XB.
```

Pokud manifold skutečně integruje kontext, stavy by se měly lišit i při
stejném lokálním vstupu.


## 12.55 Experiment PM9 – action-dependent perception

Síť provede akci:

```
move sensor.
```

Tím získá nový input.

Testujeme, zda update:

```
P(t)
    ->
action
    ->
I(t + dt)
    ->
P(t + dt)
```

zachovává objektovou a prostorovou kontinuitu.


## 12.56 Experiment PM10 – counterfactual planning

Pozdější rozšíření:

```
simulate action A
simulate action B.
```

Bez skutečné akce sledujeme predikovaný:

```
P_A'
P_B'.
```

Pokud lze tyto stavy použít k výběru akce, manifold funguje také jako
základ generativního plánování.


## 12.57 Experiment PM11 – shared latent decoder

Vytrénujeme několik jednoduchých decoderů nad stejným population state:

```
decoder_object,
decoder_position,
decoder_value,
decoder_action.
```

Pokud všechny používají společnou latentní strukturu, měly by být
schopny získat relevantní informace bez samostatné rekonstrukce
senzorických dat.


## 12.58 Experiment PM12 – causal projection test

Změníme jednu makroskopickou vlastnost manifold, například:

```
object position.
```

Sledujeme, zda se konzistentně změní:

```
motor target,
spatial language,
predicted movement.
```

To testuje, zda moduly skutečně sdílejí stejnou referenční strukturu.


## 12.59 Metrika integrace

Pro množinu modulů:

```
G1 ... Gn
```

můžeme měřit, kolik jejich výstupů lze predikovat ze společného stavu:

```
P(t).
```

Vyšší společná prediktivní informace může indikovat sdílenou latentní
reprezentaci.


## 12.60 Metrika cross-modal consistency

Pro objekt reprezentovaný více modalitami měříme:

```
consistency(
    visual projection,
    auditory projection,
    action projection
).
```

Integrovaný manifold by měl vytvářet vzájemně kompatibilní projekce.


## 12.61 Metrika continuity under sensor transformation

Změníme výrazně senzorický vstup, ale zachováme objekt.

Například:

```
illumination,
rotation,
occlusion.
```

Měříme, zda stav zůstává v:

```
same macrostate family.
```

Tím testujeme dynamickou invarianci.


## 12.62 Metrika shared causal impact

Perturbujeme latentní stav.

Měříme změnu více modulů:

```
Δaction,
Δprediction,
Δreport,
Δvaluation.
```

Pokud jedna perturbace konzistentně ovlivní více funkcí, podporuje to
hypotézu sdíleného interního modelu.


## 12.63 Falsifikační kritéria

Hypotéza sdíleného Perceptual Manifold bude oslabena, pokud:

1. jednotlivé moduly potřebují úplně nezávislé reprezentace stejného
   prostředí,
2. perturbace perceptuálního stavu neovlivňuje více downstream funkcí,
3. multimodální informace nelze integrovat do společných stavů,
4. objektová kontinuita mizí při změně modality nebo krátké okluzi,
5. stejné latentní stavy nepodporují různé funkční projekce,
6. každá nová úloha vyžaduje novou rekonstrukci původních senzorických
   dat,
7. společný dynamický stav neposkytuje žádnou výhodu oproti sadě
   nezávislých modulárních reprezentací,
8. interní manifold nelze kauzálně odlišit od pouhé analytické
   konstrukce pozorovatele.

V takovém případě by pojem Perceptual Manifold musel být omezen na
deskriptivní state-space analýzu místo funkčního sdíleného interního
modelu.


## 12.64 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H11:

> **H11 – Shared Perceptual Manifold Hypothesis**
>
> Kontinuální percepce může být realizována prostřednictvím
> distribuovaného dynamického stavového prostoru, který současně
> reprezentuje vzájemně závislé vlastnosti prostředí, těla, kontextu a
> očekávaného vývoje. Různé funkční subsystémy nemusí vytvářet vlastní
> nezávislé rekonstrukce světa, ale mohou získávat různé projekce tohoto
> společného interního stavu.

Silnější falsifikovatelná predikce:

> Pokud Perceptual Manifold skutečně funguje jako sdílený interní model,
> musí cílená změna jeho makroskopického stavu způsobit konzistentní
> změny ve více funkčně odlišných subsystémech, zatímco odstranění
> jednotlivého downstream modulu nesmí samo o sobě zničit základní
> perceptuální reprezentaci.

DPSH tím navrhuje:

```
sensory streams
    ->
shared dynamic internal world
    ->
multiple functional projections.
```

Ne:

```
sensory streams
    ->
separate reconstruction for every task.
```

Tato kapitola představuje přechod od jednotlivého perceptu k širší
hypotéze kontinuálního interního světa.

Teprve nad takovým stavem lze následně přesně položit otázku, zda některé
jeho vlastnosti mohou souviset s fenomenální zkušeností.
