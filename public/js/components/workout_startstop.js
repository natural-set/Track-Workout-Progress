export default function workout_startstop() {
    const workout_timer = document.getElementById("workout_timer");
    const start_stop_workout = document.getElementById("start_stop_workout");
    const sets_container = document.getElementById("sets_container");
    const simple_message = document.getElementById("simple_message");
    const add_set_button = document.getElementById("add_set_button");

    let timer;
    let isRunning = false;
    let seconds = 0;

    function formatTime(seconds) {
        let hrs = Math.floor(seconds / 3600).toString().padStart(2, '0');
        let mins = Math.floor((seconds % 3600) / 60).toString().padStart(2, '0');
        let secs = (seconds % 60).toString().padStart(2, '0');

        return `${hrs}:${mins}:${secs}`;
    }

    function parseTime(timeString) {
        let [mins, secs] = timeString.split(":").map(Number);
        return (mins * 60) + secs;
    }

    function updateTime() {
        workout_timer.textContent = formatTime(seconds);
    }

    start_stop_workout.addEventListener("click", function () {
        if (isRunning) {
            clearInterval(timer);
            this.textContent = "Start Workout";


            const set_fields_input_reps = document.querySelectorAll("#set_fields_input_reps");
            const set_fields_input_weight = document.querySelectorAll("#set_fields_input_weight");
            const set_fields_time = document.querySelectorAll("#set_fields_time");
            const set_fields_body_inputs = document.querySelectorAll("#set_fields_body input");
            const rest_time = document.querySelectorAll("#rest_time");

            
            let total_rest_time = 0;
            let total_reps_sets = 0;
            let total_weight_sets = 0;
            let total_time_sets = 0;

            set_fields_input_reps.forEach(input => { total_reps_sets += +input.value; })

            set_fields_input_weight.forEach(input => { total_weight_sets += +input.value; });

            set_fields_time.forEach(input => { total_time_sets += parseTime(input.textContent) });

            set_fields_body_inputs.forEach(input => { input.disabled = true; });

            rest_time.forEach(field => { total_rest_time += parseTime(field.textContent); });

            add_set_button.disabled = true;
            start_stop_workout.disabled = true;


            simple_message.innerHTML = "Workout finished!";

            console.log("Total reps did on this Workout: " + total_reps_sets);
            console.log("Total weight lifted on this Workout: " + total_weight_sets + "kg");
            console.log("Total time sets: " + formatTime(total_time_sets));
            console.log("Total rest time: " + formatTime(total_rest_time));
            console.log("Total time btw sets: " + formatTime(total_rest_time + total_time_sets));
            console.log("Total time Workout: " + workout_timer.textContent);


        } else {
            timer = setInterval(() => {
                seconds++;
                updateTime();
            }, 1000);
            this.textContent = "Finish Workout";


            sets_container.style = "display: block";
        }

        isRunning = !isRunning;

    });

    updateTime();
}
