# 6. Samoorganizace a spontánní narušení symetrie

## 6.1 Od lokální aktivity ke globálnímu stavu

Dynamic Perceptual State Hypothesis předpokládá, že koherentní
perceptuální stav nemusí být vytvořen centrálním mechanismem, který
explicitně skládá jednotlivé části reprezentace do jednoho celku.

Může vzniknout jako makroskopický důsledek lokálních interakcí.

Základní schéma je:

    local activity
        +
    recurrence
        +
    stochastic fluctuations
        +
    temporal organization
        +
    inhibition / competition
        ->
    self-organized population state.

Síť tedy nemusí obsahovat jednotku typu:

    select_percept(A).

Výběr může být výsledkem dynamiky celé populace.


## 6.2 Co znamená samoorganizace

Samoorganizací rozumíme vznik struktury, která není explicitně
zapsána v jedné centrální řídicí komponentě.

Každá lokální jednotka reaguje pouze na omezené množství informací:

    local state,
    incoming spikes,
    modulatory signals,
    oscillatory phase,
    synaptic history.

Přesto může jejich společná interakce vytvořit globální vlastnost:

    Ψ(S).

Tato globální vlastnost nemusí být dostupná žádnému jednotlivému neuronu.

Příkladem může být:

    population coherence,
    phase organization,
    attractor occupancy,
    metastable state identity,
    perceptual interpretation.

DPSH předpokládá, že percept může vznikat právě na této makroskopické
úrovni.


## 6.3 Symetrie mezi možnými stavy

Představme si, že senzorický vstup podporuje dvě možné interpretace:

    M_A
    M_B.

Jejich počáteční dynamická stabilita může být přibližně stejná:

    stability(M_A) ≈ stability(M_B).

Systém se nachází v situaci, kdy není jednoznačně určeno, který stav
bude realizován.

Tuto situaci lze chápat jako dynamickou symetrii.

Neznamená to nutně přesnou matematickou symetrii všech neuronů.

Znamená to, že několik makroskopických možností má podobnou dynamickou
dostupnost.


## 6.4 Spontánní narušení symetrie

Pokud je stav dokonale vyvážený, malá lokální fluktuace může vytvořit
počáteční rozdíl:

    activity_A =
        activity_B + ε.

Tato odchylka může vzniknout například:

    stochastic spike timing,
    phase difference,
    synaptic variability,
    previous state,
    recurrent fluctuation.

Pokud síť obsahuje zesilující zpětnou vazbu:

    ε
      ->
    local advantage
      ->
    recurrent amplification
      ->
    stronger suppression of competitor
      ->
    further advantage.

Výsledkem může být:

    M_A >> M_B.

Původně přibližně symetrický stav skončí v jedné konkrétní konfiguraci.

To je pracovní neuronální analogie spontánního narušení symetrie.


## 6.5 Symetrická pravidla, asymetrický výsledek

Důležitý princip je:

    symmetric local rules
        do not imply
    symmetric global outcome.

Síť může mít stejné parametry pro dvě konkurenční populace:

    W_A = W_B,
    threshold_A = threshold_B,
    input_A ≈ input_B.

Přesto konkrétní běh skončí například ve stavu:

    M_A.

Jiný běh může skončit:

    M_B.

Výsledek tedy nemusí být předem zapsán v architektuře.

Může vzniknout z dynamiky systému.


## 6.6 Stochasticita jako iniciační mechanismus

Spontánní stochasticita zde získává konkrétní funkci.

Nemusí vytvářet samotnou strukturu perceptu.

Může pouze určit, která z již dostupných dynamických možností získá
počáteční výhodu.

Schematicky:

    structured state space
        +
    small stochastic fluctuation
        ->
    state selection.

Tedy:

    stochasticity != percept content

ale:

    stochasticity
        can influence
    percept selection.

To umožňuje systému rozhodnout i v situaci, kdy senzorická evidence
není dostatečná pro jednoznačnou deterministickou volbu.


## 6.7 Oscilační fáze jako zdroj asymetrie

Počáteční asymetrii nemusí vytvářet pouze noise.

Pokud dvě populace existují v odlišné fázové konfiguraci:

    φ_A != φ_B,

pak stejný vstup může mít odlišný efekt.

Například:

    excitability_A > excitability_B

v konkrétním okamžiku.

Tím vzniká:

    same sensory evidence
        +
    different internal phase
        ->
    different initial advantage.

Rekurence následně může tento rozdíl zesílit.

Oscilační stav tedy může ovlivnit, který percept bude realizován.


## 6.8 Nekomutativita jako zdroj asymetrie

Podobně může asymetrii vytvářet historie.

Sekvence:

    X -> Y

může připravit systém do stavu:

    S_XY

zatímco:

    Y -> X

vede do:

    S_YX.

Pokud:

    S_XY != S_YX,

pak stejný ambivalentní vstup `Z` může skončit:

    S_XY + Z -> M_A

zatímco:

    S_YX + Z -> M_B.

Výběr perceptu tedy závisí na cestě, kterou systém prošel.


## 6.9 Rekurentní zesílení

Samotná malá asymetrie nemusí být dostatečná.

Pro vznik koherentního makrostavu je důležitá pozitivní zpětná vazba.

Například:

    population A
        ->
    recurrent excitation of A

a současně:

    population A
        ->
    inhibition of B.

Pak malý rozdíl:

    A = 0.51
    B = 0.49

může být postupně zesílen:

    0.51 / 0.49
        ->
    0.60 / 0.40
        ->
    0.75 / 0.25
        ->
    0.90 / 0.10.

Výsledkem je koherentní stav.


## 6.10 Competition a winner-take-most

DPSH nemusí vyžadovat absolutní winner-take-all.

V biologickém systému může být realistější:

    winner-take-most.

Dominantní stav:

    M_A

může potlačit alternativní reprezentaci:

    M_B

aniž by ji úplně odstranil.

To umožňuje:

    residual alternatives,
    later switching,
    ambiguity,
    perceptual reversals.

Takový systém je vhodnější pro metastabilitu než absolutně stabilní
winner-take-all.


## 6.11 Inhibice jako organizační mechanismus

Inhibice nemusí být pouze mechanismem snižujícím aktivitu.

Může vytvářet strukturu tím, že omezuje možné současné konfigurace.

Například:

    A inhibits B
    B inhibits A.

Vzniká dynamická soutěž.

V komplexnější síti:

    local excitation
        +
    lateral inhibition

může vytvářet selektivní assemblies.

DPSH proto považuje inhibici za jednu z podmínek samoorganizace
koherentního stavu.


## 6.12 Constraint satisfaction

Samoorganizaci lze interpretovat také jako dynamické řešení systému
omezení.

Každá část percepce může vytvářet lokální constraint:

    color,
    shape,
    motion,
    position,
    memory context,
    prediction.

Možný globální stav musí být kompatibilní s co největším množstvím
těchto omezení.

Síť nemusí explicitně počítat:

    optimize(global_objective).

Místo toho mohou lokální interakce postupně destabilizovat
nekonzistentní konfigurace a stabilizovat kompatibilní.

Schematicky:

    many local constraints
        ->
    recurrent interaction
        ->
    incompatible states decay
        ->
    compatible macrostate survives.


## 6.13 Predictive processing jako selekční tlak

Predictive processing může tuto dynamiku výrazně ovlivnit.

Představme si dva kandidátní stavy:

    M_A
    M_B.

Oba vysvětlují část vstupu.

Ale jejich predikční chyba je různá:

    ε_A < ε_B.

Pak může platit:

    stability(M_A) > stability(M_B).

Predikční mechanismus tedy nemusí percept vytvořit.

Může změnit "dynamickou krajinu" tak, že některé stavy jsou stabilnější
než jiné.


## 6.14 Dynamická krajina

Pro intuitivní popis lze zavést metaforu dynamické krajiny.

Stav systému:

    S(t)

se pohybuje v prostoru možností.

Některé oblasti jsou:

    unstable,
    transient,
    metastable,
    highly stable.

Senzorický vstup, zkušenost, oscillatory phase a plasticita mohou tuto
krajinu měnit.

Schematicky:

    state-space geometry =
        F(
            connectivity,
            history,
            prediction,
            oscillatory state,
            current input
        ).

Percepce potom není pouze výběrem labelu.

Je pohybem dynamického systému krajinou možných interpretací.


## 6.15 Symmetry breaking a attractor landscape

Pokud existují dvě podobně hluboké dynamické oblasti:

    basin A
    basin B,

pak malá perturbace může určit, do které z nich systém vstoupí.

Po vstupu:

    recurrent dynamics

udržuje stav po určitou dobu.

To poskytuje mechanismus:

    ambiguity
        ->
    fluctuation
        ->
    basin selection
        ->
    perceptual stabilization.


## 6.16 Proč preferovat metastabilitu před absolutní stabilitou

Absolutně stabilní attractor by mohl být nevhodný pro živou percepci.

Pokud systém jednou vstoupí do:

    M_A

a nelze jej snadno opustit, nebude schopen reagovat na změnu světa.

DPSH proto očekává:

    sufficient stability
        +
    possibility of transition.

To je metastabilita.

Samoorganizace musí tedy vytvořit stav, který je:

    coherent enough to persist

ale:

    flexible enough to change.


## 6.17 Symmetry breaking a perceptuální reversals

Ambivalentní stimuly poskytují přirozený test.

Stejný externí vstup může vést:

    M_A

a později:

    M_B.

Pokud se senzorický vstup nezměnil, změna musí pocházet z interní
dynamiky.

Kandidátní mechanismus:

    adaptation
        +
    phase drift
        +
    stochastic fluctuation
        ->
    destabilization of M_A
        ->
    symmetry restored temporarily
        ->
    selection of M_B.

Taková dynamika je kompatibilní s perceptuálním přepínáním.


## 6.18 Order parameter

Ve fyzice se spontánní narušení symetrie často popisuje pomocí
makroskopického parametru uspořádání.

Pro neuronální síť můžeme analogicky definovat:

    Ψ(S).

Například pro dvě konkurující populace:

    Ψ =
        (A - B) / (A + B).

Pak:

    Ψ ≈ 0

znamená vyvážený stav.

Naopak:

    Ψ >> 0

znamená dominanci `A`

a:

    Ψ << 0

dominanci `B`.

Tím lze symmetry breaking přímo měřit.


## 6.19 Vícedimenzionální order parameter

Pro složitější percept není jeden skalár dostačující.

Můžeme definovat vektor:

    Ψ =
        (
            coherence,
            phase_structure,
            cluster_occupancy,
            prediction_consistency,
            state_separability
        ).

Takový parametr může popisovat makroskopickou organizaci bez nutnosti
sledovat každý jednotlivý neuron.


## 6.20 Fázový přechod

Symmetry breaking může být spojen s fázovým přechodem.

Při postupném zvyšování některého parametru:

    λ

může síť dlouho zůstávat v neuspořádaném režimu.

Pak v okolí:

    λ_c

dojde ke kvalitativní změně:

    distributed weak activity
        ->
    coherent macrostate.

Kandidátní parametry:

    recurrent gain,
    sensory evidence,
    coupling strength,
    oscillatory coherence,
    inhibition strength.

DPSH zkoumá možnost, že vznik perceptuálního stavu může mít právě
charakter takového dynamického přechodu.


## 6.21 Vztah k ignition

Global Neuronal Workspace používá pojem ignition pro prudké zesílení a
globální dostupnost reprezentace.

DPSH navrhuje možné rozlišení:

    local symmetry breaking
        ->
    coherent metastable percept
        ->
    workspace ignition.

Je však také možné, že některé aspekty ignition představují přímo
makroskopický fázový přechod širší dynamiky.

To musí být testováno, nikoli předpokládáno.


## 6.22 Self-organization bez centrálního controlleru

Toto je zásadní architektonický požadavek.

Cognia nesmí řešit percept například:

    controller.select(best_state).

Takový mechanismus by pouze přesunul problém o jednu úroveň výše.

Místo toho musí výběr vzniknout z:

    local excitation,
    inhibition,
    recurrence,
    timing,
    stochasticity,
    local plasticity.

Controller může později modulovat dynamiku.

Neměl by však explicitně konstruovat percept.


## 6.23 Lokální pravidla a globální řád

Každá jednotka používá jednoduchá lokální pravidla:

    if spike arrives:
        change local state

    if threshold/hazard condition:
        generate spike

    if pre/post timing:
        modify synapse.

Přesto může vzniknout globální:

    assembly,
    attractor,
    phase relation,
    metastable percept.

To je jeden z hlavních principů DPSH:

> Komplexita perceptu nemusí být explicitně zakódována v komplexitě
> jednotlivého neuronu.


## 6.24 Symmetry breaking a počet neuronů

Zde vzniká zajímavá, ale zatím spekulativní otázka.

Velká populace jednoduchých autonomních jednotek může vytvářet bohatší
statistiku fluktuací a více možných kolektivních konfigurací než malý
počet velmi komplexních jednotek.

Je možné, že:

    many simple units
        ->
    richer emergent macrostate space.

Toto však není současný závěr DPSH.

Je to samostatná scaling hypothesis, kterou lze později experimentálně
testovat.


## 6.25 Symmetry breaking a zkušenost

Učení mění dynamickou krajinu.

Před zkušeností:

    basin_A ≈ basin_B.

Po opakovaném setkání s `A`:

    plasticity
        ->
    basin_A deepens.

Pak stejný ambivalentní vstup častěji skončí:

    M_A.

Tím se předchozí zkušenost projeví jako bias budoucího symmetry breaking.


## 6.26 Intuice jako rychlý výběr makrostavu

Tento mechanismus poskytuje možnou interpretaci intuice.

Po dlouhodobém učení může dynamická krajina obsahovat stabilní nebo
snadno dostupné oblasti.

Nový komplexní vstup může síť velmi rychle přesunout:

    S0 -> M_A

bez explicitního symbolického reasoning procesu.

Výsledný stav může přímo ovlivnit:

    action.

Systém tedy může "vědět", který makrostav odpovídá situaci, aniž by měl
globálně dostupnou explicitní kauzální rekonstrukci procesu, kterým k
němu dospěl.

To je pracovní funkční interpretace intuitivního rozhodování.


## 6.27 Symmetry breaking a Perceptual Manifold

V Perceptual Manifoldu lze možné percepty chápat jako oblasti:

    M_A,
    M_B,
    M_C.

Symmetry breaking je potom proces:

    ambiguous region
        ->
    trajectory divergence
        ->
    one selected basin.

Manifold tedy není pouze mapa hotových perceptů.

Obsahuje také hranice a přechodové oblasti, kde může dynamika rozhodnout
mezi alternativními interpretacemi.


## 6.28 Basin boundaries

Zvlášť důležité budou oblasti blízko hranic mezi stavy.

Pokud:

    S(t) near boundary(M_A, M_B),

malá perturbace může vést do jiného výsledku.

Citlivost na perturbaci lze měřit:

    sensitivity(S) =
        P(different final macrostate | small perturbation).

DPSH očekává vysokou citlivost právě v přechodových oblastech.


## 6.29 Experiment SB1 – dokonale vyvážená konkurence

Vytvoříme dvě symetrické populace:

    A
    B

s:

    same size,
    same weights,
    same input,
    same thresholds.

Systém dostane ambivalentní vstup.

Sledujeme:

    whether symmetry breaks,
    time to selection,
    final state,
    repeatability.

Při stochasticitě očekáváme distribuci:

    P(M_A) ≈ P(M_B)

při dokonale symetrických podmínkách.


## 6.30 Experiment SB2 – malý bias

Do předchozího experimentu přidáme:

    ε.

Například:

    input_A = input + ε.

Měříme:

    P(M_A | ε).

Pokud systém zesiluje malé rozdíly, měla by vzniknout sigmoidní nebo
jinak nelineární závislost:

    ε
      ->
    selection probability.

To umožní měřit citlivost dynamického rozhodování.


## 6.31 Experiment SB3 – stochasticity sweep

Budeme měnit:

    σ.

Pro každou hodnotu změříme:

    symmetry breaking time,
    stability,
    switching rate,
    accuracy under weak evidence.

Možná očekáváme:

    σ too low
        ->
    slow/no selection

    σ moderate
        ->
    flexible selection

    σ high
        ->
    unstable selection.

To přímo propojuje kapitolu 3 s symmetry breaking.


## 6.32 Experiment SB4 – phase bias

Udržíme senzorický vstup dokonale symetrický.

Změníme pouze počáteční relativní fázi:

    Δφ.

Sledujeme:

    P(M_A | Δφ).

Pokud phase configuration systematicky biasuje výsledek, oscilace
představují kauzální součást výběru makrostavu.


## 6.33 Experiment SB5 – history bias

Před ambivalentním vstupem vytvoříme dvě různé historie:

    history_A
    history_B.

Pak prezentujeme identický stimulus:

    X.

Měříme:

    P(M_A | history_A)

versus:

    P(M_A | history_B).

To testuje propojení:

    noncommutativity
        ->
    state preparation
        ->
    symmetry breaking.


## 6.34 Experiment SB6 – recurrent gain

Budeme měnit sílu rekurentní excitace:

    g_rec.

Při nízké hodnotě může být:

    no stable selection.

Při střední:

    metastable percept.

Při příliš vysoké:

    rigid attractor / pathological locking.

Měříme:

    order parameter Ψ,
    state lifetime,
    transition probability,
    perturbation recovery.

Tím lze hledat fázový přechod.


## 6.35 Experiment SB7 – inhibition strength

Podobně:

    g_inh.

Příliš slabá inhibice může způsobit:

    simultaneous activation.

Příliš silná:

    global suppression.

Mezilehlý režim může umožnit:

    selective coherent assemblies.

To určí, zda kompetice skutečně přispívá ke vzniku jednoznačného
makrostavu.


## 6.36 Experiment SB8 – perceptual reversal

Síť dostane konstantní ambivalentní stimulus po delší dobu.

Sledujeme, zda spontánně vzniká:

    M_A
      ->
    M_B
      ->
    M_A
      -> ...

Pokud ano, analyzujeme:

    adaptation,
    stochastic fluctuations,
    phase drift,
    transition timing.

Takový experiment je zvlášť vhodný pro studium metastability.


## 6.37 Experiment SB9 – perturbace makrostavu

Po stabilizaci:

    M_A

provedeme malou lokální perturbaci.

Například:

    activate subset supporting B

nebo:

    inhibit subset supporting A.

Měříme minimální perturbaci potřebnou pro:

    M_A -> M_B.

Tím lze kvantifikovat hloubku a robustnost dynamického basin.


## 6.38 Experiment SB10 – remove central selection

Pokud experimentální architektura obsahuje controller, vytvoříme variantu,
ve které controller nemá přístup k volbě perceptu.

Porovnáme:

    local self-organized selection

proti:

    centrally selected state.

Cílem je ukázat, zda síť dokáže vytvořit koherentní stav bez explicitní
globální selekční operace.


## 6.39 Falsifikační kritéria

Silná hypotéza samoorganizace a symmetry breaking bude oslabena, pokud:

1. koherentní makrostav nevznikne bez explicitního centrálního selectoru,
2. malé lokální perturbace nejsou schopny biasovat výsledek,
3. recurrence nezesiluje počáteční rozdíly,
4. inhibition/competition není relevantní pro selekci,
5. počáteční phase nebo historie nemají vliv na ambivalentní percept,
6. výsledný stav je jednoduše lineární funkcí vstupu,
7. žádný měřitelný order parameter nevykazuje přechod mezi
   neuspořádaným a organizovaným stavem,
8. metastabilní makrostavy nevykazují robustní basin-like strukturu.

V takovém případě by symmetry breaking nebyl vhodným vysvětlením vzniku
perceptu a musel by být nahrazen jednodušším mechanismem.


## 6.40 Výzkumná hypotéza kapitoly

Formulujeme dílčí hypotézu H5:

> **H5 – Self-Organized Symmetry Breaking Hypothesis**
>
> V rekurentní globálně netaktované neuronální síti může konkurence mezi
> více dynamicky dostupnými interpretačními stavy vést prostřednictvím
> lokální stochasticity, časové asymetrie, rekurentního zesílení a
> inhibice ke spontánnímu narušení symetrie a vzniku jednoho
> koherentního metastabilního makrostavu.

Silnější predikce zní:

> Pokud je perceptuální výběr skutečně samoorganizovaný, pak při
> ambivalentním vstupu musí být možné systematicky měnit pravděpodobnost
> výsledného perceptu pomocí malých lokálních perturbací, změny historie
> nebo relativní fáze, aniž by existoval centrální mechanismus explicitně
> vybírající výsledný stav.

Hypotéza netvrdí:

    symmetry breaking = consciousness.

Tvrdí:

    competing possibilities
        +
    local interactions
        ->
    spontaneous macrostate selection.

Tím poskytuje kandidátní mechanismus, jak může z distribuované aktivity
vzniknout jeden koherentní perceptuální stav bez centrálního
konstruktora.