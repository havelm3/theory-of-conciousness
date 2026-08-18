# 8. Hystereze a kontinuita vnitřního světa

## 8.1 Vnitřní stav nezačíná znovu

Dynamic Perceptual State Hypothesis předpokládá, že percepční systém
nevytváří nový interní svět od začátku při každé změně senzorického vstupu.

Namísto toho nový vstup působí na již existující stav:

```
S(t + dt) = F(S(t), I(t)).
```

To znamená, že:

```
current perception
```

není pouze funkcí:

```
current sensory input,
```

ale také:

```
previous internal state.
```

Tento princip vytváří kontinuitu.

Systém nepřechází:

```
no world
    ->
new world
    ->
no world
    ->
new world.
```

Průběžně existuje vnitřní dynamická reprezentace, která se mění v čase.

## 8.2 Kontinuita versus frame-based perception

Jednoduchý diskrétní model percepce může být reprezentován jako:

```
frame_1 -> representation_1
frame_2 -> representation_2
frame_3 -> representation_3.
```

Takový model může vytvářet přesné reprezentace jednotlivých vstupů,
ale sám o sobě nevysvětluje, proč jsou tyto reprezentace součástí
jednoho kontinuálního vnitřního světa.

DPSH preferuje popis:

```
S0
  ->
S1
  ->
S2
  ->
S3
```

kde každý nový stav vzniká transformací předchozího.

Senzorický vstup je jedním z faktorů této transformace.

Není jediným zdrojem stavu.

## 8.3 Hystereze

Hystereze znamená, že reakce systému závisí na jeho předchozí trajektorii.

Představme si parametr:

```
x
```

který postupně roste.

Systém přejde:

```
M_A -> M_B
```

při:

```
x = θ_AB.
```

Poté `x` začneme snižovat.

Přechod:

```
M_B -> M_A
```

nemusí nastat při stejné hodnotě.

Může platit:

```
θ_AB != θ_BA.
```

To znamená, že samotná aktuální hodnota vstupu nestačí k určení stavu.

Musíme znát:

```
history.
```

## 8.4 Hystereze jako makroskopická paměť

Hystereze představuje formu paměti, která nemusí být realizována
explicitní paměťovou buňkou.

Informace o minulosti je obsažena v současné dynamické konfiguraci.

Tedy:

```
history
    ->
current macrostate.
```

Systém nemusí uchovávat:

```
previous_value = X.
```

Stačí, že předchozí vývoj změnil:

```
population state,
synaptic state,
phase relations,
excitability,
attractor occupancy.
```

Tím se minulost stává fyzickou vlastností současnosti.

## 8.5 Perceptuální kontinuita

Jedním z důsledků hystereze může být stabilita perceptu při krátkodobém
výpadku senzorické evidence.

Například objekt může být dočasně zakryt.

Senzorický vstup spojený s objektem prudce poklesne:

```
I_object -> 0.
```

Přesto nemusí okamžitě platit:

```
percept_object -> 0.
```

Pokud systém zůstává v oblasti:

```
M_object,
```

pak objekt může zůstat součástí vnitřní reprezentace i během krátkého
výpadku vstupu.

## 8.6 Persistence není totéž jako neměnnost

Kontinuita vnitřního světa neznamená, že reprezentace musí být statická.

Může platit:

```
M_object(t0)
    !=
M_object(t1)
```

na mikroskopické úrovni,

ale oba stavy mohou stále reprezentovat tentýž objekt v dynamickém
kontextu.

Percept může být průběžně aktualizován bez toho, aby zanikla jeho
identita.

## 8.7 Objektová permanence jako dynamický jev

DPSH dovoluje interpretovat objektovou permanenci jako vlastnost
dynamického stavu.

Před zakrytím:

```
visible object
    ->
M_object.
```

Po zakrytí:

```
sensory evidence decreases,
```

ale:

```
prediction + previous state
    ->
persistence of M_object.
```

Objekt tedy nezůstává "v paměti" nutně jako explicitní symbol.

Může zůstat jako očekávaná součást dynamického modelu.

## 8.8 Predikce jako mechanismus kontinuity

Pokud interní stav reprezentuje objekt, může generovat očekávání:

```
object continues to exist.
```

Senzorický systém potom může očekávat například:

```
predicted position,
predicted motion,
predicted reappearance.
```

Pokud krátkodobě chybí senzorická evidence, nemusí být prediction error
dostatečný k okamžité destabilizaci stavu.

Tím vzniká:

```
perceptual persistence.
```

## 8.9 Rozpad perceptu při dlouhodobém konfliktu

Kontinuita však nemůže být neomezená.

Pokud senzorická evidence dlouhodobě odporuje internímu stavu:

```
prediction_error >> threshold,
```

musí:

```
stability(M_A) decrease.
```

Nakonec:

```
M_A -> M_B
```

nebo:

```
M_A -> unresolved state.
```

To zabraňuje tomu, aby byl vnitřní svět úplně odtržen od reality.

## 8.10 Hystereze versus halucinace

Toto rozlišení je pro DPSH zásadní.

Příliš nízká persistence:

```
world representation collapses with every missing input.
```

Příliš vysoká persistence:

```
internal state ignores contradictory evidence.
```

První režim vede k nestabilnímu perceptu.

Druhý může vést k self-sustaining interním stavům, které již nejsou
dostatečně ukotvené v prostředí.

Hypotéza proto očekává optimální oblast mezi:

```
excessive instability
```

a:

```
excessive persistence.
```

## 8.11 Stavová setrvačnost

Můžeme zavést vlastnost:

```
inertia(M_A).
```

Ta vyjadřuje, jak silná změna vstupu je potřebná k opuštění stavu.

Nízká setrvačnost:

```
small perturbation -> transition.
```

Vysoká setrvačnost:

```
large perturbation required.
```

Perceptuální kontinuita vyžaduje nenulovou, ale ne nekonečnou setrvačnost.

## 8.12 Hysterezní smyčka

Experimentálně lze hysterézi měřit změnou vstupu nahoru a dolů.

Například:

```
ambiguous stimulus parameter = x.
```

Při:

```
x increasing
```

měříme přechod:

```
A -> B.
```

Při:

```
x decreasing
```

měříme:

```
B -> A.
```

Pokud:

```
θ_AB != θ_BA,
```

vzniká hysterezní smyčka.

Její šířka:

```
H = |θ_AB - θ_BA|
```

může být jednoduchou metrikou state dependence.

## 8.13 Hystereze a nekomutativita

Hystereze je úzce spojena s nekomutativní dynamikou.

Sekvence:

```
A -> X
```

nemusí být ekvivalentní:

```
B -> X.
```

Stejný konečný vstup `X` působí na dva různé předchozí stavy.

Proto:

```
F(M_A, X)
    !=
F(M_B, X).
```

Hystereze je tedy makroskopickým důsledkem toho, že historie změnila
aktuální stav systému.

## 8.14 Hystereze a symmetry breaking

Po spontánním výběru:

```
M_A
```

může systém zůstat v tomto stavu i poté, co původní malá výhoda `A`
zmizí.

To je zásadní.

Symmetry breaking vytvoří stav.

Hystereze jej může po určitou dobu stabilizovat.

Schematicky:

```
ambiguity
    ->
symmetry breaking
    ->
M_A
    ->
hysteretic persistence.
```

## 8.15 Hystereze a metastabilita

Hystereze nesmí vést k permanentnímu uzamčení.

Proto ji DPSH spojuje s metastabilitou.

Platí:

```
previous state biases future state,
```

ale:

```
sufficient new evidence
    ->
transition.
```

To vytváří kontinuální, ale adaptivní vnitřní svět.

## 8.16 Percept není rekonstrukce každého okamžiku

Tato část hypotézy vede k důležitému důsledku.

Mozek nemusí při každém senzorickém okamžiku řešit:

```
"Jak vypadá celý svět právě teď?"
```

Místo toho může řešit:

```
"Co se změnilo vzhledem k tomu, co už předpokládám?"
```

Tedy:

```
existing internal world
    +
sensory update
    ->
modified internal world.
```

To je výrazně efektivnější než kompletní rekonstrukce od nuly.

## 8.17 Perceptual Manifold jako persistentní struktura

Perceptual Manifold není vytvářen znovu při každém vstupu.

Je průběžně deformován.

Formálně:

```
P(t + dt)
    =
G(P(t), I(t), prediction, plasticity).
```

To znamená, že:

```
P(t)
```

obsahuje důsledky předchozí zkušenosti.

Nový input mění jeho lokální geometrii, aktivní oblasti a
pravděpodobnosti přechodů.

## 8.18 Vnitřní svět jako aktivní model

Vnitřní reprezentace není pasivní kopie okolního světa.

Je aktivním generativním stavem.

Například současný model může obsahovat očekávání:

```
object behind obstacle,
person continues walking,
sound source remains present,
own body remains in position.
```

Takové informace nemusí být v každém okamžiku přímo přítomny v
senzorickém vstupu.

## 8.19 Rozdíl mezi senzorem a perceptem

Senzor poskytuje:

```
evidence.
```

Percept představuje:

```
interpretation conditioned by current internal state.
```

Proto:

```
same sensory evidence
```

může vést k:

```
different percept
```

pokud:

```
previous internal state differs.
```

To je jedna z hlavních predikcí této kapitoly.

## 8.20 Kontinuita identity objektu

Jedním z problémů percepce je zachovat identitu objektu při změně jeho
senzorických vlastností.

Objekt se může:

```
move,
rotate,
change illumination,
become partially occluded.
```

Vstup se výrazně mění.

Přesto může interní model udržet:

```
same object identity.
```

DPSH předpokládá, že tato kontinuita může být funkcí trajektorie v
Perceptual Manifold, nikoli pouze podobnosti jednotlivých frames.

## 8.21 Trajektorie objektu

Místo:

```
object = static pattern
```

může být reprezentace:

```
M_object(t).
```

Pohyb objektu:

```
position_1
    ->
position_2
    ->
position_3
```

odpovídá kontinuální trajektorii uvnitř dynamického manifold.

Objektová identita pak může být spojena s kontinuitou této trajektorie.

## 8.22 Predikce pohybu

Pokud systém zná:

```
position(t)
velocity(t),
```

může predikovat:

```
position(t + dt).
```

Pokud senzorická data krátkodobě chybí, interní trajektorie může
pokračovat:

```
predicted state evolution.
```

Po návratu senzorického vstupu se prediction porovná s realitou.

## 8.23 Oprava versus rekonstrukce

Tím vznikají dvě možné strategie.

### Rekonstrukční strategie

```
current input
    ->
rebuild entire representation.
```

### Korekční strategie

```
previous internal state
    ->
prediction
    +
sensory error
    ->
corrected internal state.
```

DPSH očekává, že druhá strategie lépe odpovídá kontinuálnímu
perceptuálnímu systému.

## 8.24 Hystereze a pozornost

Pozornost může měnit stabilitu některých oblastí manifold.

Například:

```
attention(A)
    ->
increase stability(M_A).
```

To může zvýšit hysterézi pro relevantní percept.

Jiný stav může být naopak snadněji opuštěn.

Pozornost tedy nemusí percept vytvářet.

Může měnit jeho dynamickou stabilitu.

## 8.25 Hystereze a hodnocení

Hodnoticí systémy mohou podobně deformovat dynamickou krajinu.

Pokud je:

```
M_threat
```

spojen s vysokou hodnotou relevance,

může být:

```
easier to enter
harder to leave.
```

To poskytuje možný mechanismus, jak emoce a význam mění percepci.

## 8.26 Hystereze a intuice

Dlouhodobá zkušenost může vytvořit stavové biasy.

Pokud se systém v minulosti naučil, že určitá struktura často předchází
nebezpečí:

```
context X
    ->
M_warning.
```

Při novém částečném vstupu může díky hysterézi a naučené geometrii:

```
partial X
    ->
rapid persistence of M_warning.
```

Akční systém může reagovat dříve, než je explicitní důvod globálně
dostupný.

To je kompatibilní s pracovní interpretací intuice.

## 8.27 Hystereze jako zdroj očekávání

Stav systému obsahuje implicitní očekávání dalšího vývoje.

Pokud systém zůstává:

```
S(t) in M_A,
```

pak pravděpodobnosti budoucích stavů jsou:

```
P(M_j | M_A).
```

Minulost se tak promítá do budoucnosti prostřednictvím transition
structure.

## 8.28 Temporální hloubka perceptu

Percept nemusí reprezentovat pouze současnost.

Může obsahovat:

```
trace of past,
current state,
prediction of future.
```

Pracovně:

```
percept(t)
    =
F(
    recent history,
    current evidence,
    expected continuation
).
```

Tím vzniká časově hlubší vnitřní reprezentace.

## 8.29 "Přítomný okamžik" jako časové okno

DPSH dovoluje hypotézu, že interní perceptuální "teď" není matematický
bod v čase.

Může být dynamickým intervalem, ve kterém:

```
recent past
```

stále ovlivňuje:

```
current state
```

a současný stav již obsahuje:

```
short-term prediction.
```

Tedy:

```
perceptual present
    =
temporally extended dynamic state.
```

Toto tvrzení je zatím teoretické a vyžaduje samostatné experimentální
ověření.

## 8.30 Kontinuita a Global Workspace

Pokud Global Workspace získá přístup k:

```
M_A,
```

nemusí dostávat pouze snapshot.

Může získávat přístup k dynamickému stavu, který již obsahuje:

```
history,
current context,
expected transitions.
```

Workspace tak nemusí rekonstruovat časovou kontinuitu sám.

Může ji přebírat z perceptuální dynamiky.

## 8.31 Globální přístup není globální reset

Broadcast stavu do workspace by neměl způsobit:

```
reset perceptual dynamics.
```

Naopak workspace může zpětně modulovat:

```
attention,
prediction,
action,
memory,
```

a tím dále deformovat tentýž průběžný interní stav.

Vzniká uzavřená smyčka:

```
perceptual manifold
    ->
workspace
    ->
modulation
    ->
perceptual manifold.
```

## 8.32 Experiment H1 – hysterézní stimulus sweep

Vytvoříme kontinuální stimulus:

```
x ∈ [0,1]
```

který postupně přechází mezi dvěma interpretacemi:

```
A
B.
```

První běh:

```
x: 0 -> 1.
```

Druhý:

```
x: 1 -> 0.
```

Měříme:

```
transition threshold.
```

Pokud:

```
θ_AB != θ_BA,
```

síť vykazuje hysterézi.

## 8.33 Experiment H2 – krátkodobá okluze

Síť vytvoří:

```
M_object.
```

Poté:

```
sensory object input = 0
```

po dobu:

```
Δt.
```

Sledujeme:

```
state persistence
a
prediction of reappearance.
```

Měníme délku okluze a hledáme dobu, po kterou interní reprezentace
zůstává funkční.

## 8.34 Experiment H3 – conflict duration

Po vytvoření:

```
M_A
```

začneme poskytovat evidence pro:

```
B.
```

Měříme dobu:

```
T_switch
```

potřebnou k:

```
M_A -> M_B.
```

Sledujeme vztah:

```
prediction error strength
    vs
transition time.
```

## 8.35 Experiment H4 – state reset control

Porovnáme dvě varianty.

### Continuous network

```
previous state preserved.
```

### Reset network

Před každým novým vstupem:

```
S -> S_baseline.
```

Pokud kontinuita poskytuje funkční výhodu, očekáváme rozdíly v:

```
ambiguous input interpretation,
occlusion handling,
temporal prediction,
object continuity,
generalization.
```

## 8.36 Experiment H5 – identical current input, different history

Vytvoříme:

```
history A -> X
```

a:

```
history B -> X.
```

`X` je identický.

Měříme:

```
internal state,
downstream action,
prediction.
```

Silná predikce:

```
S(X | history A)
    !=
S(X | history B).
```

## 8.37 Experiment H6 – persistence curve

Po vytvoření perceptu odstraníme podpůrný stimulus.

Měříme:

```
Q(t)
```

kde `Q` vyjadřuje kvalitu nebo dekodovatelnost perceptuálního stavu.

Můžeme získat například:

```
rapid collapse,
exponential decay,
plateau + transition.
```

Tvar persistence curve poskytne informaci o mechanismu udržování stavu.

## 8.38 Experiment H7 – contradictory evidence

Po vytvoření:

```
M_A
```

předkládáme postupně silnější evidence pro:

```
B.
```

Měříme:

```
P(M_B | evidence strength).
```

Pokud stav vykazuje dynamickou setrvačnost, přechod by měl být
nelineární.

## 8.39 Experiment H8 – hysteréze po učení

Stejný hysteresis experiment provedeme:

```
before learning
```

a:

```
after learning.
```

Pokud zkušenost mění dynamickou geometrii, může se změnit:

```
θ_AB,
θ_BA,
hysteresis width.
```

To poskytuje přímý důkaz, že učení mění persistence vlastnosti
Perceptual Manifold.

## 8.40 Experiment H9 – oscillator dependence

Hysterezi změříme při:

```
phase intact
```

a:

```
phase scrambled.
```

Pokud časová organizace přispívá ke stabilitě perceptu, může se změnit:

```
hysteresis width
nebo
state lifetime.
```

Tím propojujeme kapitolu o oscilacích s kontinuitou.

## 8.41 Experiment H10 – stochasticity dependence

Stejně měníme:

```
σ.
```

Sledujeme, zda stochasticita:

```
facilitates escape from old state
```

nebo:

```
destabilizes state excessively.
```

Může vzniknout optimální režim mezi:

```
rigidity
```

a:

```
instability.
```

## 8.42 Experiment H11 – dynamická versus explicitní paměť

Kontrolní síť bude řešit kontinuitu pomocí:

```
explicit memory variable.
```

Dynamická síť bude využívat:

```
metastable state.
```

Porovnáme:

```
occlusion,
ambiguous input,
perturbation recovery,
generalization,
spontaneous transition.
```

Cílem není ukázat, že dynamická paměť je vždy lepší.

Cílem je určit, zda vykazuje vlastnosti, které jednoduchá explicitní
paměť nevysvětluje.

## 8.43 Metrika kontinuity

Můžeme definovat:

```
C_persistence(Δt)
```

jako podobnost interního perceptuálního stavu před a po výpadku vstupu:

```
C_persistence(Δt)
    =
similarity(
    M_before,
    M_after(Δt)
).
```

Tím získáme kvantitativní měřítko kontinuity.

## 8.44 Metrika history dependence

Pro identický vstup `X` po dvou historiích:

```
S_A(X)
S_B(X)
```

můžeme definovat:

```
H_dep =
    D(S_A(X), S_B(X)).
```

Pokud:

```
H_dep ~ 0,
```

historie nemá významný vliv.

Pokud:

```
H_dep >> 0,
```

současná reprezentace je history-dependent.

## 8.45 Metrika hysteréze

Jednoduchá metrika:

```
H =
    |θ_AB - θ_BA|.
```

Pro složitější manifold lze měřit rozdíl celých transition functions:

```
H_dynamic =
    D(
        P_forward,
        P_reverse
    ).
```

## 8.46 Falsifikační kritéria

Silná hypotéza hystereze a kontinuity bude oslabena, pokud:

1. stejný současný vstup vytváří stejný interní stav bez ohledu na
   historii,
2. percept okamžitě zaniká při krátkodobém výpadku senzorické evidence,
3. resetování sítě nemění výkon v časově závislých úlohách,
4. forward a reverse stimulus sweep nevykazují žádnou měřitelnou
   hysterézi,
5. předchozí percept neovlivňuje interpretaci ambivalentního vstupu,
6. naučená zkušenost nemění persistence nebo transition geometry,
7. veškerou pozorovanou kontinuitu lze vysvětlit jednoduchou explicitní
   paměťovou proměnnou bez potřeby metastabilní dynamiky.

V takovém případě by musela být představa kontinuálního
Perceptual Manifold výrazně oslabena.

## 8.47 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H7:

> **H7 – Perceptual Continuity and Hysteresis Hypothesis**
>
> Interní perceptuální stav není vytvářen nezávisle z každého aktuálního
> senzorického vstupu, ale kontinuálně vzniká transformací předchozího
> dynamického stavu. V důsledku toho vykazuje percepční systém
> history dependence, stavovou setrvačnost a hysterézi: stejný aktuální
> vstup může být interpretován odlišně podle trajektorie, která mu
> předcházela.

Silnější predikce:

> Pokud Perceptual Manifold skutečně představuje průběžný interní model
> světa, musí perceptuální informace krátkodobě přetrvávat i při výpadku
> přímé senzorické evidence, současný stav musí ovlivňovat interpretaci
> následného ambivalentního vstupu a přechodové prahy mezi percepty musí
> záviset na směru předchozího vývoje systému.

Tato hypotéza netvrdí:

```
persistence = consciousness.
```

Tvrdí:

```
previous internal state
    +
current sensory evidence
    ->
current percept.
```

Tím vzniká jedna z hlavních vlastností DPSH:

> Systém nemá pouze sérii reprezentací světa. Má průběžně existující
> vnitřní svět, který nová zkušenost modifikuje.
