const button = document.getElementById('button');
const idInput = document.getElementById('id');
const titleInput = document.getElementById('title');
const descriptionInput = document.getElementById('description'); 
const display = document.getElementById('display');

// A counter to track the number of posts
let postCount = 0;

// Function to add a post to the display
function addPost(idValue, titleValue, descriptionValue) {
    // Increment the post count
    postCount++;

    // Create a new card for the post
    const cardDiv = document.createElement('div');
    cardDiv.classList.add();
    cardDiv.innerHTML = `
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">${titleValue}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Id: ${idValue}</h6>
                <p class="card-text">${descriptionValue}</p>
                <a href="../pages/detail.html?id=${idValue}">Learn More</a> <br>
                <p class="d-inline-flex gap-1">
                  <a href="../pages/edit.html?id=${idValue}"><button type="button" class="btn btn-primary">Edit</button></a>
                  <a href=""><button type="button" class="btn btn-danger">Delete</button></a>
                </p>
            </div>
        </div>
    `;

    // Append the new post (card) to the display div
    display.appendChild(cardDiv);
}

// Function to load posts from JSON file
function loadPostsFromJSON() {
    fetch('./data.json')
        .then(response => response.json())
        .then(data => {
            data.posts.forEach(post => {
                addPost(post.id, post.title, post.description);
            });
        })
        .catch(error => {
            console.error('Error loading posts:', error);
        });
}

// Load the posts from JSON when the page loads
window.onload = function() {
    loadPostsFromJSON();
};

// Add a new post when the button is clicked
button.addEventListener('click', (event) => {
    event.preventDefault();  // Prevent default form submission

    // Get the values from the input fields
    const idValue = idInput.value;
    const titleValue = titleInput.value;
    const descriptionValue = descriptionInput.value;

    // Add the post to the display
    addPost(idValue, titleValue, descriptionValue);

    // Clear the input fields after the post is added
    idInput.value = '';
    titleInput.value = '';
    descriptionInput.value = '';
});
