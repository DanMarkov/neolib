
    let selectMenu = document.querySelector("#books");
    let category = document.querySelector(".right h2");
    let container = document.querySelector(".book-wrapper");

    selectMenu.addEventListener("change", function(){
        let categoryName = this.value;
        category.innerHTML = this[this.selectedIndex].text;  
    
        let http = new XMLHttpRequest();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                let response = JSON.parse(this.responseText);
                //let response = this.responseText;
                let out = "";
                for(let item of response){
                    out += `
                        <div class="book">
                            <div class="left">
                                <img src="${item.picture}" alt="book cover">
                            </div>
                            <div class="right">
                                <p class="book_id">book id: ${item.book_id}</p>
                                <p class="author_id">author id: ${item.author_id}</p>
                                <p class="name">title: ${item.name}</p>
                                <p class="added_on">added on: ${item.added_on}</p>
                            </div>
                        </div>
                    `;
                }
                container.innerHTML = out;
            };
        }	
        http.open('POST', '../system/script.php', true);
        http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        http.send("category="+categoryName);
    });
 
