const id = new URLSearchParams(window.location.search).get("id"); 
const url = "http://localhost:3000/posts"; 
const form = document.getElementById("form");
const submit = document.getElementById("button");

const showId = async () => {
    const post = await fetch(url + `/${id}`);
    const res = await post.json(); 
    document.getElementById('id').value = res.id;
    document.getElementById('title').value = res.title;
    document.getElementById('description').value = res.description;
}


submit.addEventListener("click", async (event) => {
    event.preventDefault(); 
    
    const updatedPost = {
        title: document.getElementById('title').value,
        description: document.getElementById('description').value
    };

    await fetch(url + `/${id}`, { 
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(updatedPost)
    });

    alert("Post updated successfully!"),window.location.href="../index.html"; 
   
});

showId(); 