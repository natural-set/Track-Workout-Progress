var muscle = 'biceps'
fetch('https://api.api-ninjas.com/v1/exercises?muscle=' + muscle, {
    headers: { 'X-Api-Key': 'd1BDAMa/72jD4C++1s9Uww==ZH7fr5KjYTjBXREG' }
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));