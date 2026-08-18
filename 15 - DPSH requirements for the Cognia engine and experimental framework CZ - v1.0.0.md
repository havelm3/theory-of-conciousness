# 15. Požadavky DPSH na Cognia engine a experimentální framework

## 15.1 Účel této kapitoly

Dynamic Perceptual State Hypothesis je experimentální hypotéza.

Aby bylo možné její jednotlivé části skutečně testovat, Cognia engine
nesmí fungovat pouze jako prostředí pro definici neuronových sítí.

Musí zároveň fungovat jako:

    simulator,
    perturbation framework,
    recorder,
    replay system,
    ablation platform,
    experimental runtime.

Základní požadavek je:

> Každý mechanismus předpokládaný DPSH musí být možné samostatně
> implementovat, parametrizovat, měřit, vypnout a porovnat s kontrolní
> variantou.

Cognia proto nemá pouze vytvořit systém, který "funguje".

Musí umožnit zjistit:

    proč funguje,
    který mechanismus je nutný,
    který mechanismus je redundantní,
    co se změní po jeho odstranění.


## 15.2 Oddělení tří vrstev systému

Cognia by měla důsledně oddělit minimálně tři vrstvy:

### 1. Engine layer

Zajišťuje:

    event processing,
    simulation time,
    random generator,
    logging,
    snapshotting,
    replay.

### 2. Neural architecture layer

Definuje:

    neurons,
    synapses,
    oscillators,
    memory units,
    modulators,
    controllers,
    populations.

### 3. Experimental layer

Definuje:

    stimuli,
    interventions,
    ablations,
    measurements,
    hypotheses,
    expected outcomes.

Toto oddělení je zásadní.

Experimentální podmínka nesmí být skrytě implementována jako změna
samotného enginu.


## 15.3 Globální čas enginu versus globální clock sítě

Engine samozřejmě potřebuje nějakým způsobem reprezentovat čas.

To však neznamená, že neuronální síť používá globální clock.

Je nutné rozlišovat:

    simulation time

od:

    neural processing clock.

Engine může evidovat:

    t = 12.351 ms

a zpracovat událost.

Neuronální architektura však nesmí být nucena do:

    tick 1 -> update all neurons
    tick 2 -> update all neurons
    tick 3 -> update all neurons.

Tedy:

    engine has time

ale:

    network has no mandatory global update step.


## 15.4 Event-driven execution

Základní režim Cognia DPSH by měl být event-driven.

Událost může být například:

    spike,
    oscillator phase event,
    sensory event,
    plasticity event,
    refractory end,
    modulation event.

Každá událost má:

    source,
    target,
    timestamp,
    type,
    payload.

Například:

    Event {
        source: neuron_12
        target: neuron_54
        type: spike
        time: 12.351 ms
    }.

Engine zpracovává události v časovém pořadí.


## 15.5 Event queue

Je potřeba explicitní:

    event queue.

Minimální vlastnosti:

    insert(event),
    pop_next(),
    peek_next_time(),
    cancel(event),
    inspect_queue().

Queue musí respektovat:

    exact timestamp order.

Při shodném timestampu musí být chování:

    deterministic under fixed seed

nebo musí být explicitně definováno pravidlo ordering.


## 15.6 Stabilní ordering při stejném čase

Pokud dvě události nastanou ve stejném čase:

    t_A = t_B,

musí být jasné, zda:

    A then B

nebo:

    B then A

nebo:

    both treated as simultaneous.

To je pro nekomutativní dynamiku zásadní.

Engine nesmí libovolně měnit pořadí bez záznamu.


## 15.7 Lokální lifecycle neuronu

Každý neuron musí mít vlastní stav:

    state_i(t).

Minimálně může obsahovat:

    membrane-like activation,
    refractory state,
    adaptation,
    baseline spike probability,
    recent spike history,
    local modulation.

Neuron se aktualizuje:

    when relevant event arrives

nebo:

    when its own internal dynamics requires it.

Nemusí se přepočítávat při každé změně globálního času.


## 15.8 Autonomní interní události

Neuron musí mít možnost naplánovat vlastní budoucí událost.

Například:

    next spontaneous spike candidate,
    refractory end,
    adaptation decay.

To umožňuje autonomní lifecycle bez globálního ticku.


## 15.9 Stochastic neuron

Cognia musí obsahovat minimálně jeden parametrizovatelný stochastic
neuron model.

Musí podporovat:

    baseline firing,
    input-dependent firing probability,
    refractory period,
    optional noise amplitude,
    random seed control.

Obecně:

    P(spike_i,t) =
        F(
            baseline,
            current_state,
            input,
            oscillator modulation,
            stochastic component
        ).


## 15.10 Deterministic control neuron

Pro každý stochastic model musí existovat odpovídající deterministická
kontrola.

Například:

    same input transform,
    same threshold,
    no random component.

To umožní přímo testovat:

    stochastic ON

versus:

    stochastic OFF.


## 15.11 Random subsystem

Randomness nesmí být rozptýlený neřízeně po enginu.

Cognia musí mít centralizovaný experimentální random subsystem:

    RandomContext.

Musí podporovat:

    seed,
    stream id,
    snapshot,
    replay.

Například:

    random("neuron_12", "spike_generation").

To umožní přesnou reprodukci.


## 15.12 Oddělené random streams

Je vhodné oddělit random streams podle funkce:

    spontaneous spikes,
    synaptic noise,
    stimulus noise,
    initialization,
    learning noise.

Pak lze například zmrazit:

    spontaneous randomness

a měnit pouze:

    input noise.


## 15.13 Frozen randomness

Engine musí umožnit:

    record random sequence

a následně:

    replay exact sequence.

To je nutné pro experimenty:

    fresh stochasticity

versus:

    frozen stochasticity.


## 15.14 Synapse

Synapse nesmí být pouze:

    weight.

Minimální stav:

    Synapse {
        weight
        delay
        plasticity_rule
        plasticity_state
        enabled
    }.


## 15.15 Synaptické zpoždění

Každá synapse musí podporovat:

    delay_ij.

Spike vzniklý:

    t

dorazí:

    t + delay_ij.

Delay musí být experimentálně měnitelný a logovatelný.


## 15.16 Fixní versus adaptivní delay

Engine by měl podporovat dvě varianty:

### Fixed delay

    d_ij = const.

### Plastic delay

    d_ij(t)

měnitelný učením.

Druhá varianta není nutná pro první experimenty, ale architektura by ji
neměla znemožnit.


## 15.17 Excitační a inhibiční synapse

Musí být explicitně podporováno:

    excitatory connection

a:

    inhibitory connection.

Inhibice nesmí být implementována pouze jako záporný workaround, pokud
to znemožní rozdílnou plasticitu nebo dynamiku.


## 15.18 Plasticita jako samostatný mechanismus

Plasticity rule musí být oddělena od neuronu a synapse tak, aby bylo
možné snadno zaměňovat:

    STDP,
    Hebbian,
    rate-based,
    no plasticity.

Například:

    plasticity STDP {
        pre_window
        post_window
        learning_rate
    }.


## 15.19 STDP

Minimální STDP implementace musí mít:

    t_pre,
    t_post,
    Δt,
    Δw.

A logovat:

    every plasticity event.

To umožní zpětně ověřit, zda učení skutečně proběhlo podle očekávaného
timingu.


## 15.20 Modulovaná plasticita

Plasticita musí umožňovat modulaci:

    learning_gain.

Například:

    prediction error,
    relevance,
    reward,
    consolidation gate.

Formálně:

    Δw =
        learning_gain * STDP(Δt).


## 15.21 Learning gate

Musí existovat možnost:

    plasticity ON
    plasticity OFF

globálně i lokálně.

Například:

    group.visual.plasticity = off.

To je zásadní pro ablation experimenty.


## 15.22 Oscillator jako síťový prvek

Explicitní oscillator musí být definován jako objekt neuronální
architektury.

Například:

    oscillator Theta {
        frequency: 8 Hz
        phase: 0
        amplitude: 1
    }.

Oscillator není scheduler enginu.


## 15.23 Oscillator output

Oscillator může generovat:

    continuous modulation

nebo:

    discrete periodic events.

Musí být možné definovat jeho vazbu na neurony:

    oscillator -> neuron group.

A typ modulace:

    excitability,
    threshold,
    spike probability,
    synaptic gain,
    plasticity gain.


## 15.24 Více oscilátorů

Síť musí podporovat mnoho nezávislých lokálních oscilátorů:

    O1,
    O2,
    ...
    On.

Každý s:

    frequency,
    phase,
    amplitude,
    coupling.


## 15.25 Phase query

Pro každou událost musí být možné zjistit:

    phase(O_k, t).

To je nutné pro následnou analýzu:

    spike phase distribution,
    phase locking,
    phase-dependent plasticity.


## 15.26 Phase scrambling

Experimentální framework musí podporovat operaci:

    phase_scramble(group).

Ta může:

    randomize oscillator phase,
    destroy cross-population phase relationships,

ale ideálně zachovat:

    mean oscillation frequency,
    amplitude,
    average firing rate.

Toto je jeden z klíčových experimentálních zásahů celé DPSH.


## 15.27 Phase jitter

Vedle úplného scramblingu musí existovat:

    phase_jitter(σ_phase).

To umožní hledat časový threshold:

    how much phase disruption breaks function.


## 15.28 Emergentní oscilace

Engine nesmí vyžadovat explicitní oscillator object.

Musí být možné vytvořit rekurentní mikroobvod, ze kterého oscilace
vznikne emergentně.

Recorder musí být schopen její přítomnost následně detekovat.


## 15.29 Controller

Cognia může obsahovat controllery.

Je však nutné rozlišit:

    modulatory controller

od:

    hidden central executive.

Controller může nastavovat:

    gain,
    attention,
    learning gate,
    relevance.

Neměl by například přímo volat:

    percept = choose_best_state().

Pokud by to dělal, samoorganizace by nebyla skutečně emergentní.


## 15.30 Memory cells

Explicitní paměťové jednotky mohou existovat.

Musí však být jasně označené jako:

    explicit state storage.

To umožní porovnat:

    dynamic memory

versus:

    explicit memory cell.


## 15.31 Memory ablation

Experimentální framework musí umožnit:

    memory_cells OFF

aniž změní ostatní architekturu.

To je nutné pro test:

    does metastable state retain context without explicit memory?


## 15.32 Population abstraction

Cognia by měla podporovat práci s populacemi:

    population VisualA[100]
    population VisualB[100].

Je potřeba pro:

    symmetric competition,
    excitation/inhibition,
    oscillator modulation,
    collective analysis.


## 15.33 Population recorder

Pro každou populaci musí být možné logovat:

    spike count,
    firing rate,
    population state,
    oscillator phase,
    coherence,
    mean activation.

To usnadní sledování makrostavů.


## 15.34 Globální state recorder

Jedna z nejdůležitějších komponent:

    StateRecorder.

Musí být možné v čase ukládat:

    neuron states,
    spike events,
    oscillator states,
    synaptic weights,
    relevant modulatory states.

Výzkumným objektem není jen output.

Je:

    S(t).


## 15.35 Sampling state-space

Nemusí být praktické ukládat kompletní stav po každé mikro-události.

Recorder musí podporovat:

    fixed sampling interval,
    event-triggered snapshot,
    selected variable recording.

Například:

    sample every 1 ms

nebo:

    snapshot on macrostate transition.


## 15.36 Spike log

Spike log musí obsahovat minimálně:

    neuron id,
    population,
    timestamp,
    local phase,
    incoming cause if available.

To umožní rekonstruovat:

    spike trains,
    order,
    causal chains.


## 15.37 Causal trace

Velmi užitečná funkce:

    trace(event_id).

Ta by měla ukázat:

    which events contributed to this event.

Nemusí jít o plnou filosofickou kauzalitu.

Stačí technický provenance graph.


## 15.38 Synaptic change log

Každá změna:

    w_ij

musí mít:

    old value,
    new value,
    timestamp,
    pre event,
    post event,
    modulation value,
    learning rule.

To je zásadní pro Deep State Learning experimenty.


## 15.39 Snapshot sítě

Engine musí podporovat:

    snapshot network_state.

Snapshot musí zahrnout:

    neurons,
    synapses,
    oscillator phases,
    random streams,
    pending events,
    plasticity state.

Pouze tak lze přesně vytvořit dvě experimentální větve ze stejného
počátečního stavu.


## 15.40 Restore

Musí existovat:

    restore(snapshot).

Pak můžeme provést:

    branch A = phase intact
    branch B = phase scrambled

od přesně stejného okamžiku.


## 15.41 Experimental branching

Ideální framework:

    snapshot S0

        /\
       /  \
      A    B

A:

    control condition.

B:

    intervention.

Porovnáváme:

    trajectories.


## 15.42 Ablation API

Každý významný mechanismus by měl být možné vypnout bez přepisování
architektury.

Například:

    ablate stochasticity
    ablate oscillators
    ablate recurrence
    ablate plasticity
    ablate prediction
    ablate workspace.

To snižuje riziko implementačních confounds.


## 15.43 Soft ablation

Vedle ON/OFF by měla existovat i graduální manipulace:

    recurrence_gain = 0.0 ... 1.0
    stochasticity = 0.0 ... X
    phase_jitter = 0 ... X.

Mnoho přechodů bude pravděpodobně nelineárních.


## 15.44 Matched controls

Framework musí umožnit aktivně vytvářet kontroly se zachovanými
statistikami.

Například phase scrambling experiment musí ideálně držet podobné:

    firing rate,
    spike count,
    total activity.

To může vyžadovat:

    adaptive gain normalization.


## 15.45 Rate-matched control

Pro experimenty s timingem by měl existovat helper:

    match_firing_rate(reference, target).

Tím lze snížit možnost, že rozdíl vznikl pouze kvůli změně množství
aktivity.


## 15.46 Spike-count-matched replay

Další možnost:

    record spike train

a následně vytvořit:

    reordered train

se stejným:

    neuron participation,
    spike count.

Manipulujeme pouze timing/order.


## 15.47 Order scrambling

Framework musí podporovat:

    reorder_events(window, mode).

Například:

    reverse,
    random permutation,
    fixed jitter.

To je klíčové pro test nekomutativní dynamiky.


## 15.48 Delay perturbation

Musí být možné:

    perturb_delays(group, distribution).

Například:

    +1 ms jitter
    shuffle delays
    zero delays.

To umožní testovat časovou topologii.


## 15.49 Input framework

Stimulus nesmí být hardcoded v architektuře.

Musí existovat:

    InputSource.

Ten generuje časově definované sensory events.


## 15.50 Stimulus sequence

Například:

    stimulus A from 0–100 ms
    blank 100–300 ms
    ambiguous X 300–400 ms.

Experiment musí být zapsán deklarativně.


## 15.51 Ambiguous input

Framework musí podporovat vstupy, které:

    equally support multiple states.

To je nutné pro:

    symmetry breaking,
    hysteresis,
    perceptual reversal.


## 15.52 Continuous stimulus sweep

Pro hysterézi musí být možné generovat parametrický vstup:

    x(t) = 0 -> 1

a pak:

    1 -> 0.

S přesným logem transition threshold.


## 15.53 Occlusion

Sensory framework musí podporovat:

    temporary input removal

bez resetu sítě.

To je důležité pro test kontinuity.


## 15.54 Unexpected continuation

Pro predictive experiments:

    learned A -> B

ale test:

    A -> C.

Framework musí přesně evidovat:

    expected sequence
    actual sequence.


## 15.55 Multi-modal inputs

Později musí být možné definovat paralelní:

    visual input
    audio input
    body input.

Každý s vlastním timestampingem.


## 15.56 Output není jediná metrika

Experiment framework nesmí předpokládat, že každý pokus má:

    one output label.

Výstup může být:

    action,
    trajectory,
    state classification,
    transition time,
    prediction error.


## 15.57 State-space export

Cognia musí umět exportovat experimentální data do formátu vhodného pro:

    PCA,
    UMAP,
    clustering,
    transition analysis,
    trajectory comparison.

Například:

    CSV,
    JSONL,
    binary matrix.


## 15.58 Feature selection

Nemusíme analyzovat každý interní parametr.

Framework by měl umožnit:

    record feature set.

Například:

    neuron activation only

nebo:

    activation + phase + synaptic variables.


## 15.59 Macrostate detector

Pro některé experimenty bude užitečný modul:

    MacrostateDetector.

Neměl by být součástí sítě.

Je pouze analytickým nástrojem pozorovatele.

Může například identifikovat:

    clusters,
    transitions,
    dwell times.


## 15.60 Žádný hidden percept object

Engine nesmí obsahovat stav:

    CurrentPercept = A

pokud ho neuronální systém sám nevytvořil jako explicitní downstream
reprezentaci.

Analytický nástroj může později říct:

    trajectory classified as M_A.

Ale to je external analysis.


## 15.61 Decodability test

Framework musí umožnit vytrénovat externí decoder nad stavovými daty:

    state -> context label.

Decoder nesmí ovlivnit samotnou síť.

Je pouze měřicí nástroj.


## 15.62 Causal perturbation

Vedle dekódování musí být možné do state-space zasáhnout.

Například:

    stimulate population A
    inhibit population B
    shift oscillator phase.

Poté sledovat:

    trajectory change,
    behavior change.


## 15.63 Perturbation API

Například:

    perturb {
        at: 250 ms
        target: population.A
        type: activation
        strength: 0.2
    }.


## 15.64 Local perturbation

Zásahy by měly být pokud možno lokální.

Globální:

    set_state(M_B)

by porušil princip emergentní dynamiky.

Lepší:

    activate subset,
    inhibit subset,
    phase shift,
    synaptic perturbation.


## 15.65 Workspace layer

Global Workspace musí být implementován jako samostatná dynamická
struktura.

Ne jako:

    global variable.

Měl by mít:

    workspace populations,
    recurrent connections,
    candidate inputs,
    broadcast outputs.


## 15.66 Workspace access measurement

Framework musí měřit:

    which modules received information,
    when,
    for how long.

To umožní definovat:

    global accessibility.


## 15.67 Workspace ablation

Musí být možné:

    disable workspace

bez odstranění nižších perceptuálních modulů.


## 15.68 Workspace feedback

Musí být možné experimentálně oddělit:

    feedforward access

a:

    top-down feedback.

Například:

    broadcast ON
    feedback OFF.


## 15.69 Predictive subsystem

Cognia musí podporovat alespoň dvě možnosti.

### Explicit predictor

    state -> predicted sensory input.

### Implicit prediction

    learned state transitions.

Obě musí být samostatně testovatelné.


## 15.70 Prediction-error channel

Pokud použijeme explicitní prediction error, měl by být distribuovatelný.

Ne pouze:

    global_error scalar.

Například:

    error.visual.position
    error.visual.shape
    error.audio.frequency.


## 15.71 Precision modulation

Pozdější verze musí umožnit:

    error gain.

Například:

    precision = 0.2

pro noisy sensor.

Tím lze testovat attention/precision hypotézy.


## 15.72 Controller jako modulátor prediction

Controller může například měnit:

    prediction gain,
    sensory gain,
    attention.

Ale neměl by přímo nastavovat:

    correct percept.


## 15.73 Experiment definition

Každý experiment by měl být deklarativně popsatelný.

Například:

    experiment PhaseScramble {
        hypothesis: H3
        seed: 42

        stimulus: A_blank_X

        branches:
            control:
                phase: intact

            intervention:
                phase: scrambled

        metrics:
            state_separability
            dwell_time
            choice
    }.


## 15.74 Hypothesis metadata

Každý experiment by měl mít:

    hypothesis id,
    prediction,
    null hypothesis,
    falsification criterion.

To přímo spojuje teorii s výsledkem.


## 15.75 Predefined outcome

Například:

    prediction:
        phase scramble decreases state separability

    null:
        no significant change

    falsification:
        no effect across predefined parameter range.

Tím se omezuje post-hoc interpretace.


## 15.76 Experiment registry

Framework by měl evidovat:

    experiment id,
    code version,
    network version,
    theory version,
    seed,
    date,
    parameters,
    result.

To je zásadní pro reprodukovatelnost.


## 15.77 Theory version

Každý experiment musí evidovat:

    DPSH version.

Například:

    DPSH-0.1.

Pokud později změníme hypotézu, nesmíme zpětně reinterpretovat starý
experiment bez označení.


## 15.78 Engine version

Podobně:

    Cognia engine version.

Výsledek musí být reprodukovatelný proti konkrétnímu runtime.


## 15.79 Network configuration hash

Každá síť může mít:

    config hash.

Tím lze ověřit, že dvě podmínky skutečně používají stejnou architekturu.


## 15.80 Parameter sweeps

Framework musí umožnit automaticky měnit:

    stochasticity,
    recurrence,
    oscillator frequency,
    phase,
    delay,
    learning rate.

Výstup:

    parameter -> metric.


## 15.81 Multidimensional sweep

Například:

    stochasticity x phase jitter x recurrence gain.

To bude důležité pro hledání:

    critical regimes.


## 15.82 Nehledat pouze nejlepší výsledek

Sweep nesmí být použit pouze k nalezení:

    highest score.

Musíme analyzovat:

    regime transitions,
    stability regions,
    failure boundaries.


## 15.83 Criticality detection

Pokud například při:

    g_rec = g_c

dojde k náhlému:

    state coherence increase,

framework by měl umožnit zachytit:

    phase transition-like behavior.


## 15.84 Replikace přes seeds

Každý stochastic experiment musí být spuštěn:

    across multiple seeds.

Výsledkem není jeden běh.

Je distribuce:

    P(metric).


## 15.85 Confidence intervals

Experimentální výstup musí podporovat:

    mean,
    variance,
    confidence interval.

Bez toho nebude možné oddělit efekt od stochastic variability.


## 15.86 Baseline models

Cognia framework by měl podporovat kontrolní architektury:

    synchronous RNN-like model,
    explicit memory model,
    rate-coded attractor,
    deterministic recurrent model.

DPSH musí být porovnávána s jednoduššími alternativami.


## 15.87 Synchronous control

Zvlášť důležitý control:

    same architecture

ale:

    synchronous batched updates.

Cílem je testovat rozdíl:

    event-driven timing

versus:

    global discretization.


## 15.88 Rate-based control

Další:

    convert spike activity to rates.

To umožní testovat, zda timing obsahuje informace nad rámec rate.


## 15.89 Explicit memory control

Například:

    memory bit stores context A/B.

Pokud tato jednoduchá varianta vysvětlí všechny výsledky stejně dobře,
DPSH musí prokázat jinou výhodu.


## 15.90 Analytical observer separation

Veškeré metriky jako:

    cluster id,
    manifold dimension,
    macrostate label

musí existovat mimo neuronální síť.

Síť sama nesmí dostat tyto analytické informace, pokud to není explicitně
součást experimentu.


## 15.91 Performance profiler

Protože event-driven systém může být výpočetně náročný, engine musí
měřit:

    events per second,
    queue size,
    memory usage,
    neuron updates,
    synaptic events.

To umožní později řešit škálování.


## 15.92 Sparse connectivity

Engine by měl být od začátku optimalizován pro:

    sparse graph.

To je důležité jak biologicky, tak výpočetně.

Nesmí předpokládat:

    all-to-all connectivity.


## 15.93 Velké množství jednoduchých neuronů

Architektura musí umožnit experiment:

    many simple neurons

versus:

    fewer complex neurons.

Toto je důležité pro pozdější scaling hypothesis.


## 15.94 Dynamické vytváření populací

Pozdější experimenty mohou vyžadovat:

    dynamic recruitment

neuronu do různých assemblies.

Engine proto nesmí pevně předpokládat, že funkční role neuronu je během
běhu neměnná.


## 15.95 Neuromodulation

Pozdější verze by měla podporovat globální nebo regionální modulátory:

    dopamine-like,
    relevance,
    arousal,
    learning gain.

Ne jako biologickou kopii, ale jako obecný modulatory signal.


## 15.96 Internal input

Cognia musí podporovat rozdíl:

    external sensory input

a:

    internal neural input.

Interní moduly musí být schopny vstupovat do stejného dynamického
systému jako senzorické kanály.

To je důležité pro:

    memory,
    valuation,
    attention,
    prediction,
    workspace feedback.


## 15.97 Žádné privilegované external/internal API

Z pohledu neuronu může být vhodné, aby sensory i internal event měly
podobný mechanismus doručení.

Rozdíl je ve zdroji, ne nutně ve fyzice propagace.


## 15.98 Continuous run

Síť musí být schopna běžet:

    indefinitely

bez implicitního:

    reset after sample.

To je zásadní pro kontinuitu perceptu.


## 15.99 Trial boundaries jsou analytické, ne fyzické

Experiment může mít:

    trial 1
    trial 2.

Ale pokud testujeme kontinuitu, hranice trialu nesmí automaticky
resetovat neuronální stav.

Reset musí být explicitní intervention.


## 15.100 Blank interval

Framework musí explicitně podporovat:

    no sensory input

při současném:

    network continues to evolve.


## 15.101 Sleep-like offline period

Pro Deep State Learning lze později zavést režim:

    sensory disconnected
    spontaneous dynamics active
    selected plasticity active.

To může být použito pro experimenty s konsolidací.


## 15.102 State freeze

Pro některé kontrolní experimenty bude užitečné:

    freeze plasticity

nebo:

    freeze oscillator phase

nebo:

    freeze synaptic weights.

Tím lze oddělit dynamické komponenty.


## 15.103 Replay sensory input

Sensory stream musí být možné:

    record

a poté:

    replay exactly.

Dvě sítě pak dostanou identický externí svět.


## 15.104 Replay internal events

Pro některé kontrolní experimenty může být užitečné replayovat také:

    exact internal spike sequence.

To umožní rozlišit:

    architecture response

od:

    stochastic event generation.


## 15.105 State comparison

Framework musí obsahovat funkce:

    compare_states(S_A, S_B)
    compare_trajectories(T_A, T_B).

Výsledná metrika může být pluggable.


## 15.106 Trajectory distance

Možné metriky:

    Euclidean latent distance,
    dynamic time warping,
    cosine similarity,
    classifier separability.

Není nutné jednu metodu zakódovat do teorie.


## 15.107 Transition detection

Framework musí detekovat:

    M_A -> M_B

na základě externího analytického modelu.

To umožní měřit:

    dwell time,
    transition probability,
    hysteresis.


## 15.108 Transition matrix

Po více bězích vytvoříme:

    P_ij.

To je klíčový objekt pro analýzu Perceptual Manifold.


## 15.109 Deep Percept metrics

Framework musí umět počítat nebo exportovat podklady pro:

    decodability,
    persistence,
    metastability,
    history dependence,
    temporal sensitivity,
    prediction relevance,
    causal impact,
    robustness,
    generalization,
    integration.


## 15.110 Žádný jediný consciousness score

Cognia nesmí mít:

    consciousness = 0.83.

To by bylo metodologicky zavádějící.

Může existovat:

    DeepPerceptMetrics

jako vektor funkčních vlastností.


## 15.111 Debug mode

Výzkumný engine musí umožnit detailní debug:

    why did neuron fire?
    which spikes arrived?
    what was phase?
    what changed weight?

Bez toho bude interpretace malých experimentů obtížná.


## 15.112 Visualizer

Velmi užitečný bude později vizualizační nástroj:

    raster plot,
    population activity,
    oscillator phase,
    state-space trajectory,
    transition graph.

Není nutný pro samotnou funkci sítě, ale zásadně pomůže výzkumu.


## 15.113 Deterministická reprodukce při fixed seed

Pro stejný:

    network,
    input,
    seed,
    engine version

musí být:

    exact event log reproducible

v rámci jednoho numerického prostředí.

To je základní validační podmínka.


## 15.114 Numerická přesnost

Engine musí explicitně definovat:

    time precision.

Například:

    nanoseconds,
    microseconds,
    floating-point seconds.

Nesmí docházet k náhodnému přerovnání událostí kvůli numerickému
zaokrouhlení.


## 15.115 Časová granularita není neuronální clock

Pokud engine používá například:

    1 µs resolution,

nejde o:

    neural update clock.

Je to pouze numerická přesnost reprezentace timestampu.


## 15.116 Parallel execution

Pozdější optimalizace může zpracovávat nezávislé události paralelně.

Musí však zachovat:

    causal ordering.

Výkonová optimalizace nesmí změnit fyziku experimentu.


## 15.117 GPU execution

Cognia může později využít GPU.

Ale batch processing nesmí nechtěně zavést:

    global synchronous update.

Pokud GPU vyžaduje batch, musí být jasně odlišeno:

    implementation batching

od:

    model synchronization.


## 15.118 Validation suite

Před DPSH experimenty musí existovat unit/integration testy pro:

    event ordering,
    delay,
    refractory period,
    stochastic probability,
    phase calculation,
    STDP timing,
    snapshot/restore,
    random replay.


## 15.119 Test event ordering

Například:

    A at 10 ms
    B at 9 ms.

Queue musí vždy doručit:

    B before A.


## 15.120 Test non-commutative ordering

Vytvořit neuron, pro který:

    A -> B

vede k:

    state X

a:

    B -> A

k:

    state Y.

Engine musí tento rozdíl zachovat.


## 15.121 Test delay

Spike:

    source at 10 ms
    delay 5 ms

musí dorazit:

    exactly 15 ms.


## 15.122 Test random reproducibility

Seed:

    42

musí generovat stejnou sekvenci stochastic events.


## 15.123 Test snapshot/restore

Po:

    snapshot at t=100 ms

musí obnovený běh se stejným seedem vytvořit stejnou budoucí trajektorii,
pokud není provedena intervention.


## 15.124 Test branch intervention

Z jednoho snapshotu:

    branch A unchanged
    branch B phase shifted.

Rozdíl v trajektorii pak lze skutečně připsat intervention.


## 15.125 Test STDP

Definovat:

    pre at 10 ms
    post at 15 ms.

Ověřit očekávané:

    Δw.

Pak obrátit pořadí.


## 15.126 Test oscillator

Ověřit:

    phase(t)

a modulaci neuronální response.


## 15.127 Minimální DPSH engine 0.1

Pro první experimenty není nutné implementovat vše.

Minimální verze potřebuje:

1. event-driven scheduler,
2. simulation time,
3. stateful neuron,
4. stochastic firing,
5. refractory period,
6. excitatory/inhibitory synapses,
7. delays,
8. explicit local oscillator,
9. oscillator modulation,
10. recurrence,
11. fixed-seed randomness,
12. spike/state recorder,
13. snapshot/restore,
14. phase scramble,
15. mechanism ablation.

Plasticita může přijít v další iteraci, pokud první experiment testuje
pouze dynamiku.


## 15.128 Cognia DPSH engine 0.2

Další verze přidá:

    STDP,
    plasticity logging,
    learning gates,
    spontaneous replay,
    manifold comparison.


## 15.129 Cognia DPSH engine 0.3

Poté:

    prediction,
    prediction-error modulation,
    multiple sensory channels,
    precision.


## 15.130 Cognia DPSH engine 0.4

Následně:

    Global Workspace,
    cross-module broadcast,
    top-down feedback.


## 15.131 První experimentální architektura

První síť by měla být velmi malá.

Například:

    Population A
    Population B

s:

    recurrent excitation within population,
    mutual inhibition,
    stochastic baseline,
    local oscillatory modulation.

Úkolem je pouze zjistit:

    can metastable symmetry-broken states emerge?


## 15.132 Druhá architektura

Rozšířit o:

    sensory A,
    sensory B,
    ambiguous X.

Test:

    A -> blank -> X
    B -> blank -> X.

To bude první Deep Percept context experiment.


## 15.133 Třetí architektura

Přidat:

    phase manipulation.

Test:

    intact phase
    vs
    scrambled phase.

Při matched firing rate.


## 15.134 Čtvrtá architektura

Přidat:

    STDP.

Testovat:

    experience changes state-space geometry.


## 15.135 Pátá architektura

Přidat:

    predictive continuation.

Například:

    A -> B -> C sequence.


## 15.136 Šestá architektura

Přidat:

    second modality

a:

    shared downstream modules.

Testovat:

    Perceptual Manifold integration.


## 15.137 Sedmá architektura

Teprve poté:

    Global Workspace.

To zabrání tomu, aby se v experimentu smíchalo příliš mnoho mechanismů.


## 15.138 Minimální datový formát experimentu

Každý běh by měl generovat:

    metadata.json
    events.csv
    states.csv
    synapses.csv
    metrics.json.

Například:

    metadata:
        theory_version
        engine_version
        experiment
        seed
        parameters.


## 15.139 Standardní experimentální report

Každý experiment by měl skončit strukturovaným reportem:

### Hypothesis

    H3.

### Manipulation

    phase scramble.

### Controls

    matched rate,
    matched spike count.

### Primary metric

    state separability.

### Secondary metrics

    dwell time,
    transition entropy.

### Result

    ...

### Falsification status

    supported / weakened / falsified / inconclusive.


## 15.140 Inconclusive je validní výsledek

Pokud experiment neodlišuje mechanismy, výsledek musí být:

    inconclusive.

Nesmí být automaticky interpretován jako podpora.


## 15.141 Oddělení vývoje a experimentu

Jakmile je experiment definován, změna enginu během běhu experimentální
série musí vytvořit novou:

    engine version

a experiment musí být spuštěn znovu.

Jinak nelze výsledky porovnávat.


## 15.142 Architektonické principy jazyka Cognia

Z hlediska DSL by měly být základní konstrukty přibližně:

    neuron
    population
    synapse
    oscillator
    memory
    modulator
    controller
    input
    workspace
    plasticity
    experiment.

Každý musí mít jasně oddělenou sémantiku.


## 15.143 Event jako první třída

Pro DPSH může být velmi užitečné zavést:

    event

jako explicitní první-class koncept jazyka nebo runtime.

Protože velká část teorie se týká:

    timing,
    ordering,
    propagation.


## 15.144 Delay jako první třída

Podobně:

    delay

nesmí být pouze interní technický detail synapse.

Je experimentální proměnná.


## 15.145 Phase jako první třída

Oscilační:

    phase

musí být dostupná:

    modulation rules,
    plasticity rules,
    recorder,
    experiment interventions.


## 15.146 Internal state jako první třída

Neuron nebo další dynamický konstrukt musí mít:

    state { ... }.

To umožní vytvářet biologicky i abstraktně inspirované jednotky.


## 15.147 Mechanism composition

Cognia by měla podporovat skládání mechanismů.

Například:

    stochastic neuron
        +
    oscillator modulation
        +
    STDP synapses.

Ne vytvářet nový hardcoded typ pro každou kombinaci.


## 15.148 Experimentální transparentnost

Každý mechanismus musí být viditelný ve zdrojovém popisu.

Skrytá automatická optimalizace enginu, která mění:

    timing,
    firing,
    connectivity

může znehodnotit experiment.


## 15.149 No implicit learning

Engine nesmí měnit váhy, pokud není explicitně aktivní:

    plasticity rule.

To je nutné pro kontroly.


## 15.150 No implicit reset

Engine nesmí automaticky resetovat:

    neuron states,
    oscillator phases,
    random streams

mezi stimuli.


## 15.151 No implicit synchronization

Engine nesmí implicitně zarovnávat lokální události do jednoho ticku,
pokud to není explicitně experimentální control condition.


## 15.152 Hlavní implementační princip

Cognia DPSH engine musí respektovat:

> **Globální stav nesmí být přímo konstruován enginem. Engine poskytuje
> pouze lokální dynamické mechanismy a přesnou časovou infrastrukturu.
> Makroskopické perceptuální stavy musí vzniknout jako výsledek
> interakcí definovaných neuronální architekturou.**


## 15.153 Hlavní experimentální princip

Každé tvrzení musí mít podobu:

    mechanism
        ->
    predicted observable.

Pak:

    intervention
        ->
    predicted change.

Pokud změna nenastane:

    hypothesis weakened.


## 15.154 Primární požadavky pro nejbližší implementaci

Pro první skutečnou vývojovou fázi Cognia doporučuje DPSH prioritu:

### P0 – nezbytné

    event queue
    absolute simulation timestamps
    synaptic delays
    stateful autonomous neuron
    stochastic baseline firing
    refractory state
    local oscillator
    phase modulation
    recurrence
    excitatory/inhibitory connections
    snapshot/restore
    fixed seed
    event/state logging.

### P1 – první experimenty

    phase scrambling
    timing scrambling
    rate-matched controls
    population recorder
    trajectory export
    macrostate analysis.

### P2 – učení

    STDP
    learning gate
    synaptic logging
    frozen replay
    spontaneous-learning condition.

### P3 – vyšší architektura

    predictive loops
    multi-modal inputs
    shared manifold projections
    Global Workspace.


## 15.155 Výzkumná hypotéza kapitoly

Formulujeme technickou hypotézu H13:

> **H13 – Experimental Realizability Hypothesis**
>
> Pokud jsou klíčové mechanismy DPSH skutečně kauzálně relevantní,
> musí být možné je realizovat jako oddělitelné lokální komponenty
> event-driven neuronálního systému a jejich přítomnost nebo odstranění
> musí vytvářet reprodukovatelné a specifické změny ve state-space
> dynamice bez nutnosti explicitně konstruovat globální perceptuální
> stav v enginu.

Silnější technická predikce:

> Minimální Cognia síť tvořená autonomními stochastic neurony,
> rekurentními excitačními a inhibičními vazbami, synaptickými delays a
> lokální oscilační modulací musí být schopna vytvořit měřitelné
> metastabilní makrostavy bez explicitního memory registeru nebo
> centrálního percept selectoru.

Pokud ani taková minimální architektura nevytvoří předpokládanou
dynamiku, musí být příslušná část DPSH revidována dříve, než budou do
systému přidány další vyšší mechanismy.


## 15.156 Bezprostřední implementační cíl

První implementační milestone tedy není:

    create conscious Cognia.

Je:

> **Vytvořit reprodukovatelný event-driven experimentální engine, ve
> kterém lze z přesně stejného počátečního stavu větvit běh s jednou
> kontrolovanou intervencí a následně kvantitativně porovnat vzniklé
> neuronální trajektorie.**

Jakmile tento framework existuje, lze začít skutečně testovat DPSH.

Od tohoto okamžiku přestává být hlavním úkolem další rozšiřování teorie.

Hlavním úkolem je:

    implement
        ->
    measure
        ->
    falsify
        ->
    revise.