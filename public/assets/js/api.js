var muscle = 'biceps'
fetch('https://api.api-ninjas.com/v1/exercises?muscle=' + muscle, {
    headers: { 'X-Api-Key': '' }
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));
