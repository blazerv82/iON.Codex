$(document).ready(function() {

    // Set variables
    const search_bar = document.querySelector("#search_bar");
    const results = document.querySelector("#results");

    const search_by_content = document.querySelector("#content");
    const search_by_tags = document.querySelector("#tags");

    const search_by_click_array = [search_by_content, search_by_tags];

    // Auto search upon load
    search(search_bar.value, 'content');

    // Check for any change in search term, re-do search
    search_bar.addEventListener("keyup", function() {

        try {
            
            if ($('.selected_search_param')[0]) {
                search_type_sel = $('.selected_search_param')[0].id;
            } else {
                search_type_sel = 'content';
            }

            search(this.value, search_type_sel);
        }
        catch (e) { console.error(e); }

    });

    // Add visual class that searches via selected, content or tags
    search_by_click_array.forEach(e => {
    
        e.addEventListener("click", function() {;

            $('.selected_search_param').removeClass('selected_search_param');

            if (e.classList.contains('selected_search_param')) {
                e.classList.remove('selected_search_param');
            } else {
                e.classList.add('selected_search_param');
            }

            search(search_bar.value, $('.selected_search_param')[0].id)
        });
    });

    // Reach out to PHP, grab content sorted by input and search_type, output to webpage
    async function search(input, search_type){

        try {
            await fetch(`app.core/php/js_to_php.php?action=search&query=${input}&type=${search_type}`, {
                method: 'GET',
            })
            .then (response => {
                return response.text();
            })
            .then (data => {
                return results.innerHTML = data;
            })
            .catch (err => {
                throw err;
            });
        } 
        catch (err) { console.error('Error:', err); }
    }

    // Reach out to PHP, grab all posts for admin, output to webpage
    async function adminShowAll(input, search_type){

        try {
            await fetch(`app.core/php/js_to_php.php?action=admin_show_all&query=${input}&type=${search_type}`, {
                method: 'GET',
            })
            .then (response => {
                return response.text();
            })
            .then (data => {
                return $('#admin_results').innerHTML = data;
            })
            .catch (err => {
                throw err;
            });
        } 
        catch (err) { console.error('Error:', err); }
    }
})