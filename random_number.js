// Create a new Date object
const now = new Date();

// Get the current date and time as a string
const dateTimeString = now.toString();  // or use now.toLocaleString() for a locale-specific format
    
document.getElementById('dateTimeDisplay').innerHTML = dateTimeString;

console.log(dateTimeString)

let array=[1,2,3,4,5,6,7,8,9,10]
for(i=0; i<=array.length; i++){
    if(i%2==1){
    console.log(i)
}

}
// Function to generate a random number between 1 and 10
function getRandomNumber() {
    return Math.floor(Math.random() * 10) + 1;
}

// Function to handle the guessing game
function startGuessingGame() {
    const randomNumber = getRandomNumber(); // Generatecf random number
    let attempts = 0; // Initialize the number of attempts

    while (attempts < 3) {
        // Prompt the user to enter a number
        const userInput = prompt('Guess a number between 1 and 10:');
        const userGuess = parseInt(userInput, 10);

        // Check if the user input is a valid number
        if (isNaN(userGuess) || userGuess < 1 || userGuess > 10) { 
            alert('Please enter a valid number between 1 and 10.');
            continue;
        }

        // Compare the user's guess with the random number
        else if(userGuess === randomNumber) {
            alert('Congratulations! You guessed the number correctly.');
            return; // Exit the function if the guess is correct
        } else {
            attempts++; // Increment attempts on wrong guess
            alert(`Wrong guess. You have ${3 - attempts} program is closed.`);
        }
    }

    // Inform the user if they have exhausted all attempts
    alert(`Sorry, you've used all your attempts. The correct number was ${randomNumber}.`);
}

// Start the game when the page loads
document.addEventListener('DOMContentLoaded', startGuessingGame);