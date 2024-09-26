/*const form = document.querySelector("form");
const id = document.getElementById('id');
const title = document.getElementById('title');
const description = document.getElementById('description'); 
const button = document.querySelector("button");

// Function to log the values in the console
function showName(idValue, titleValue, descriptionValue) {
  console.log("ID: ", idValue);
  console.log("Title: ", titleValue);
  console.log("Description: ", descriptionValue);
}

// Prevent the form from submitting and call showName
form.addEventListener('submit', (event) => {
  event.preventDefault();  // Prevent the form from submitting
  showName(id.value, title.value, description.value);
});*/
const form = document.getElementById("form");
const submit = document.getElementById("submit");

const handleSubmit = async (event) => {
  event.preventDefault(); // Prevent form submission
  
  const url = "http://localhost:3000/posts"; // API URL

  // Limit the description to 50 words
  const descriptionValue = form.description.value.split(' ').slice(0, 50).join(' ');

  // Fetch request to post data to data.json
  await fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json", // Ensure correct headers
    },
    body: JSON.stringify({
      id: form.id.value,           // Get the ID value from the form
      title: form.title.value,     // Get the Title value from the form
      description: descriptionValue, // Get the limited Description (50 words max)
    })
  })
  .then(response => response.json())
  .then(data => console.log("Success:", data))
  .catch(error => console.error("Error:", error));
};

// Add the event listener, pass the function reference, not the invocation
submit.addEventListener("click", handleSubmit);