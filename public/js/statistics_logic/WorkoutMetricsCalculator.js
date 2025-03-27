export default class WorkoutMetricsCalculator {
    constructor(workout = []) {
        this.workout = workout;
    }

    volumeLoadPerSet() {
        const volumeLoadPerSet = [];
        this.workout.sets.forEach(set => {
            volumeLoadPerSet.push(set.reps * set.weight);
        });
        return volumeLoadPerSet;
    }

    totalVolumeLoad() {
        let totalVolumeLoad = 0;
        this.workout.sets.forEach(set => {
            totalVolumeLoad += set.reps * set.weight;
        });
        return totalVolumeLoad;
    }

    /* 
    *- AVL = adjusted volume load
    *- TuT/rep = timworkouter_under_tension per rep
    */
    adjustedVolumeLoad() {
        let adjusted_volume_load = 0;
        const timer_under_tension_per_rep = this.timerUnderTensionPerRep();

        this.workout.sets.forEach((set, index) => {
            adjusted_volume_load += set.reps * set.weight * timer_under_tension_per_rep[index];
        });

        return adjusted_volume_load;
    };

    totalSessionTime() {
        let total_session_time = 0;
        this.workout.sets.forEach(set => {
            total_session_time += set.execution_time + set.rest_time;
        });
        return total_session_time;
    }

    /* 
    *- higher values means progression
    *- OPI = overload progression index
    *- TuT/rep = timer_under_tension per rep
    *- tst = total session time
    */
    overloadProgressionIndex() {
        //search for more examples of this formula
        let overload_progression_index = 0;
        let total_session_time = this.totalSessionTime();
        const timer_under_tension_per_rep = this.timerUnderTensionPerRep();
        this.workout.sets.forEach((set, index) => {
            overload_progression_index += set.weight * set.reps * timer_under_tension_per_rep[index];
        });
        const result = overload_progression_index / total_session_time;
        return result.toFixed(2);

    };
    overloadProgressionIndexPerRep() {
        let overload_progression_index = 0;
        let RPE = 3.5; // this is just an example
        let total_session_time = this.totalSessionTime();
        const timer_under_tension_per_rep = this.timerUnderTensionPerRep();
        this.workout.sets.forEach((set, index) => {
            overload_progression_index += set.weight * set.reps * timer_under_tension_per_rep[index];
        });
        const result = overload_progression_index / (total_session_time * (1 + RPE / 10));
        return result.toFixed(2);

    };

    /* 
    *- EIRM = estimated 1 rep max
    *- Epley equation to estimate your one‐repetition maximum (1RM)
    */
    oneRepMax() {
        let one_rep_max = 0;
        let current_rep_max = 0;
        this.workout.sets.forEach(set => {
            current_rep_max = set.weight * (1 + set.reps / 30);

            if (current_rep_max > one_rep_max) {
                one_rep_max = current_rep_max;
            }
        });

        return one_rep_max.toFixed(0);
    };

    oneRepMaxPerSet() {
        const one_rep_max_per_set = [];
        this.workout.sets.forEach(set => {
            one_rep_max_per_set.push((set.weight * (1 + set.reps / 30)).toFixed(0));

        });
        return one_rep_max_per_set;
    };

    /* 
    *- IRM = intensity or % of 1 rep max
    *- this needs to be measured for each goal
    *- this measures the intensity of the workout using expecific load, then for different amounts of weight it will be diffent.
    */
    intensityPerSet() {
        const intensity_per_set = [];
        const one_rep_max_per_set = this.oneRepMaxPerSet();
        this.workout.sets.forEach((set, index) => {
            intensity_per_set.push(((set.weight / one_rep_max_per_set[index]) * 100).toFixed(0));
        });
        return intensity_per_set;
    };

    overAllIntensity() {
        let intensity = 0;
        let current_intensity_set = 0;
        const one_rep_max = this.oneRepMax();
        this.workout.sets.forEach(set => {

            current_intensity_set = ((set.weight / one_rep_max) * 100).toFixed(0);

            if (current_intensity_set > intensity) {
                intensity = current_intensity_set;
            }
        });
        return intensity;
    };

    /* 
    *- TuT = time under tension in seconds
    *- this calc is the verse of the original one, because i already get the execution time;
    */
    timerUnderTensionPerRep() {
        const timer_under_tension_per_set = [];
        this.workout.sets.forEach(set => {
            timer_under_tension_per_set.push(set.execution_time / set.reps);
        });
        return timer_under_tension_per_set;
    };

    timerUnderTension() {
        let time_under_tension = 0;
        this.workout.sets.forEach(set => {
            time_under_tension += set.execution_time;
        });
        return time_under_tension;
    };

    /*
    *- hiegher values means more efficient training
    *- TD = training density
    *- The start of your first set until the end of your final set, including all rest intervals between sets.
    */
    trainingDensity() {
        let total_session_time = this.totalSessionTime();
        const adjusted_volume_load = this.adjustedVolumeLoad();
        const result = adjusted_volume_load / total_session_time;

        return result.toFixed(2);

    };

    /* 
    *- Rate of Perceived Exertion (RPE) as it gives insight into how hard the session felt.
    */
    ratePerceivedExertion() {
        const rpe_per_set = [];
        const rpe_descriptions = {
            "Light Effort": [0, 4],
            "Moderate Effort": [5, 6],
            "Hard Effort": [7, 8],
            "Near failure": [9, 10]
        };

        this.workout.sets.forEach(set => {
            for (const description in rpe_descriptions) {
                const [min, max] = rpe_descriptions[description];
                if (set.rpe >= min && set.rpe <= max) {
                    rpe_per_set.push({ description, value: set.rpe });
                }
            }
        });
        return rpe_per_set;
    };

    overAllRatePerceivedExertion() {
        let current_rpe = 0;
        this.workout.sets.forEach(set => {
            if (set.rpe > current_rpe) {
                current_rpe = set.rpe;
            }
        });

        const rpe_descriptions = {
            "Light Effort": [0, 4],
            "Moderate Effort": [5, 6],
            "Hard Effort": [7, 8],
            "Near failure": [9, 10]
        };

        for (const description in rpe_descriptions) {
            const [min, max] = rpe_descriptions[description];

            if (current_rpe >= min && current_rpe <= max) {
                return { description, value: current_rpe };
            }

        }

        return { description: "Unknown Effort", value: current_rpe };
    }
}