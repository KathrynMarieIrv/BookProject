 $(document).ready(function() {
	var item, title, authors, publisher, bookLink, bookImg
		var outputList = document.getElementById("list-output");
		var bookUrl = "https://www.googleapis.com/books/v1/volumes?q="
		var placeHldr = 'img src=https://via.placeholder.com/150'
		var searchData;
		
		//listener for search Button
		$("#search").click(function() {
			outputList.innerHTML = ""
			searchData = $("#search-box").val();
			//handling empty search input field
			if(searchData === "" || searchData === null) {
				displayError();
			}
			else {
				$.ajax({
					url: bookUrl + searchData,
					dataType: "json",
					success: function(res) {
						console.log(res)
						if(res.totalItem === 0) {
							alert("no results!.. try again");
						}
						else {
							$("#title").animate('margin-top: 10px');
						$(".book-list").css("visibility", "visible");
						displayResults(res);
						}
					},
					error: function() {
						alert("Something went wrong!...");
					}
					
				})
			}$("#search-box").val("");
			
		});
		
		//function to display results in index.HTML
		function displayResults(res) {
			for(var i = 0; i < res.items.length; i+=2) {
		item = res.items[i];
		title1 = item.volumeInfo.title;
		authors1 = item.volumeInfo.authors;
		publisher1 = item.volumeInfo.publisher;
		bookLink1 = item.volumeInfo.previewLink;
		bookIsbn = item.volumeInfo.industryIdentifiers[1].identifier;
		bookImg1 = (item.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail : placeHldr ;
		
		item2 = res.items[i+1];
		title2 = item2.volumeInfo.title;
		authors2 = item2.volumeInfo.authors;
		publisher2 = item2.volumeInfo.publisher;
		bookLink2 = item2.volumeInfo.previewLink;
		bookIsbn2 = item2.volumeInfo.industryIdentifiers[1].identifier;
		bookImg2 = (item2.volumeInfo.imageLinks) ? item2.volumeInfo.imageLinks.thumbnail : placeHldr ;
		
		
		//output to output list
		outputList.innerHTML += '<div class="row mt-4">' +
		formatOutput(bookImg1, title1, authors1, publisher1, bookLink1, bookIsbn);
		formatOutput(bookImg2, title2, authors2, publisher2, bookLink2, bookIsbn2);
		'</div>';
		
		}
		}
		function formatOutput(bookImg,title, authors, publisher, bookLink, bookIsbn) {
			var htmlCard = `<div class="col-lg-6">
			<div class="card" style="">
			<div class="row no-gutters">
			<div class="col-md-4">
		<img src="${bookImg}" class="card-img" alt="...">
		</div>;
		<div class="col-md-8">
		<div class="card-body">
		<h5 class="card-title">${title}</h5>
		<p class="card-text">Author: ${authors} </p>
		<p class="card-text">Publisher: ${publisher} </p>
		</div>
		</div>
		</div>
		</div>
		</div>`
		return htmlCard;
		}
		
		//handling error empty search 
		function displayError() {
			alert("search item can not be empty");
			}
			
});