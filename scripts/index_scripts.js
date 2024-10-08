document.getElementById('search').addEventListener('input', function() {
    const query = this.value;

    if (query.length > 0) {
        fetch(`search.php?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                const suggestions = document.getElementById('suggestions');
                suggestions.innerHTML = ''; // Clear previous suggestions
                suggestions.style.display = 'none'; // Hide suggestions initially

                if (data.length > 0) {
                    data.forEach(item => {
                        const suggestionItem = document.createElement('a');
                        suggestionItem.classList.add('list-group-item', 'list-group-item-action');
                        suggestionItem.textContent = item.name;
                        suggestionItem.href = `food_details.php?id=${item.id}`; // Link to food_details.php
                        suggestionItem.onclick = function(event) {
                            event.preventDefault(); // Prevent default link behavior
                            document.getElementById('search').value = item.name; // Set search input
                            suggestions.style.display = 'none'; // Hide suggestions
                            window.location.href = suggestionItem.href; // Redirect to food_details.php
                        };
                        suggestions.appendChild(suggestionItem);
                    });
                    suggestions.style.display = 'block'; // Show suggestions
                }
            })
            .catch(error => console.error('Error fetching suggestions:', error));
    } else {
        document.getElementById('suggestions').style.display = 'none'; // Hide suggestions if input is empty
    }
});

// Handle search button click
document.getElementById('search-button').addEventListener('click', function() {
    const query = document.getElementById('search').value;

    if (query) {
        // Fetch suggestions again to find matching ID
        fetch(`search.php?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    // Assuming first matching item is selected for simplicity
                    window.location.href = `food_details.php?id=${data[0].id}`; // Redirect to food_details.php with ID of the first match
                } else {
                    alert('No matching recipe found!');
                }
            })
            .catch(error => console.error('Error during search:', error));
    } else {
        alert('Please enter a recipe name to search.');
    }
});


document.getElementById('search-button').addEventListener('click', function() {
    console.log('Search button clicked!'); // Add this line
    const query = document.getElementById('search').value;
    console.log(query);
});

