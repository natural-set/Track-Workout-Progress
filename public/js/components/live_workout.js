import WorkoutMetricsCalculator from "../statistics_logic/WorkoutMetricsCalculator.js";
import workout_startstop from "./workout_startstop.js";

const add_set_button_container = document.getElementById("add_set_button_container");
const add_set_button = document.getElementById("add_set_button");
const set_template = document.getElementById("set_template");
const start_stop_workout = document.getElementById("start_stop_workout");
const set_fields_time = document.getElementById("set_fields_time");
const do_next_set_container = document.getElementById("do_next_set_container");
const do_next_set_button = document.getElementById("do_next_set_button");

let timer;
let current_position = 0;
let isRunning = false;
let seconds = 0;

function formatTime(seconds) {
    // let hrs = Math.floor(seconds / 3600).toString().padStart(2, '0');
    let mins = Math.floor((seconds % 3600) / 60).toString().padStart(2, '0');
    let secs = (seconds % 60).toString().padStart(2, '0');

    return `${mins}:${secs}`;
}

start_stop_workout.addEventListener("click", function () {

    if (isRunning) {
        clearInterval(timer);

    } else {
        timer = setInterval(() => {
            seconds++;
            set_fields_time.textContent = formatTime(seconds);
        }, 1000);

    }

    isRunning = !isRunning;

});


let set_fields_created_order = 1;
add_set_button.addEventListener("click", () => {

    set_fields_created_order++;
    const new_set = `
			<div id="set_fields_wrapper" style='display: none'>
				<div id="set_header">
					<span>${set_fields_created_order} St</span>
                    </div>
                    <div id="set_fields_body">
                        
                        <label>Reps</label>
					    <input id="set_fields_input_reps" type="number" placeholder="Reps" value="12">
                        
			            <label>Weight</label>
                        <input id="set_fields_input_weight" type="number" placeholder="kg" value="10">
                        
			            <label>Time</label>
                        <span id="set_fields_time" type="number">00:00</span>
                    
                        <div id="rest_set_container" style="display:none">
			            	<label>Rest Time:</label>
			            	<span id="rest_time">00:00</span>
			            </div>
                    </div>
                </div>
			</div>
		`;

    set_template.insertAdjacentHTML("beforeend", new_set);

    const rest_set_container = document.querySelectorAll("#rest_set_container");

    rest_set_container[current_position].style = "display: block";
    do_next_set_container.style = "display: block";
    add_set_button_container.style = "display: none";

    if (isRunning) {
        clearInterval(timer);
        current_position++;
        seconds = 0;
    }

    timer = setInterval(() => {
        seconds++;
        rest_time[current_position - 1].textContent = formatTime(seconds);
    }, 1000);

});

do_next_set_button.addEventListener("click", () => {
    const sets_fields_time = document.querySelectorAll("#set_fields_time");
    const set_fields_wrapper = document.querySelectorAll("#set_fields_wrapper");

    do_next_set_container.style = "display: none";
    set_fields_wrapper[current_position].style = "display: block";
    add_set_button_container.style = "display: block";


    if (isRunning) {
        clearInterval(timer);
        seconds = 0;

    }
    timer = setInterval(() => {
        seconds++;
        sets_fields_time[current_position].textContent = formatTime(seconds);
    }, 1000);
});

// startstop
workout_startstop();

const workout = {
    info: { workout_time: 1080 },
    sets: [
        { reps: 7, weight: 80, execution_time: 21, rest_time: 180, rpe: 4 },
        { reps: 10, weight: 80, execution_time: 30, rest_time: 180, rpe: 5  },
        { reps: 6, weight: 90, execution_time: 21, rest_time: 180, rpe: 8  },
        { reps: 9, weight: 80, execution_time: 27, rest_time: 180, rpe: 6  },
        { reps: 5, weight: 80, execution_time: 15, rest_time: 180, rpe: 7  }
    ]
};

const volumeLoad = new WorkoutMetricsCalculator(workout);
console.log("total volume load: " + volumeLoad.totalVolumeLoad());
console.log("volume load per set: " + volumeLoad.volumeLoadPerSet());
console.log("total time under tension: " + volumeLoad.timerUnderTension());
console.log("total adjusted volume load: " + volumeLoad.adjustedVolumeLoad());
console.log("training density: " + volumeLoad.trainingDensity());
console.log("overlaod progression index: " + volumeLoad.overloadProgressionIndex() + " | " + "extended overlaod progression index: " + volumeLoad.overloadProgressionIndexPerRep());
// console.log("one rep max per set: " + volumeLoad.oneRepMaxPerSet() + " | " + "one rep max: " + volumeLoad.oneRepMax());
console.log("one rep max weight: " + volumeLoad.oneRepMax());
console.log("overall training intensity: " + volumeLoad.overAllIntensity());
console.log("one rep max weight per set: " + volumeLoad.oneRepMaxPerSet());

console.log("training intensity per set: " + volumeLoad.intensityPerSet());

volumeLoad.ratePerceivedExertion().forEach((rpe, index) => {
    console.log("Set " + (index + 1) + " RPE: " + rpe.value + " | " + "Set " + (index + 1) + " RPE description: " + rpe.description);
})


console.log("Workout RPE: " + volumeLoad.overAllRatePerceivedExertion().value + " | " + "Workout RPE description: " + volumeLoad.overAllRatePerceivedExertion().description);


