const id = new URLSearchParams(window.location.search).get("id"); // Get the ID from the URL
const LearnMore = document.getElementById("LearnMore");
const url = "http://localhost:3000/posts"; // Base URL for the API

const singlepost = async () => {
  try {
    // Fetch the post by ID
    const post = await fetch(url+`/${id}`);
    const res = await post.json(); // Parse the response as JSON

    // Construct the HTML for the post
    const div = `
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">${res.title}</h5>
          <p class="card-text">Id: ${res.id}</p>
          <p class="card-text">Description: ${res.description}</p>
         <p class="d-inline-flex gap-1">
                  <a href=""><button type="button" class="btn btn-primary">Edit</button></a>
                  <a href=""><button type="button" class="btn btn-danger">Delete</button></a>
                </p>
        </div>
      </div>
    `;

    // Inject the generated HTML into the output element
    LearnMore.innerHTML = div;
    
  } catch (error) {
    console.error("Error fetching post:", error);
    LearnMore.innerHTML = `<p>Error loading post details.</p>`;
  }
};

// Call the function to display the single post
singlepost();