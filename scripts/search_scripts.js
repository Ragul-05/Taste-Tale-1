document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search");
    const suggestionsBox = document.getElementById("suggestions");

    searchInput.addEventListener("input", function () {
        const query = this.value;

        if (query.length > 2) {
            fetch(`search.php?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    suggestionsBox.innerHTML = ""; // Clear previous suggestions
                    if (data.length > 0) {
                        suggestionsBox.style.display = "block"; // Show suggestions
                        data.forEach(item => {
                            const div = document.createElement("div");
                            div.textContent = item.name; // Use the name from the database
                            div.addEventListener("click", () => {
                                searchInput.value = item.name; // Set input to clicked suggestion
                                suggestionsBox.innerHTML = ""; // Clear suggestions
                                suggestionsBox.style.display = "none"; // Hide suggestions
                            });
                            suggestionsBox.appendChild(div);
                        });
                    } else {
                        suggestionsBox.style.display = "none"; // Hide if no suggestions
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            suggestionsBox.style.display = "none"; // Hide suggestions if input is less than 3 characters
        }
    });

    // Hide suggestions when clicking outside
    document.addEventListener("click", function (e) {
        if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
            suggestionsBox.style.display = "none";
        }
    });
});
