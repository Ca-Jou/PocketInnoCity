function toggleHeart(e)
{
	//Get title and content
	var parent_tags = e.parentElement.getElementsByTagName("div")[0];
	var title = encodeURI(parent_tags.getElementsByTagName("h3")[0].textContent);
	var content = encodeURI(parent_tags.getElementsByTagName("p")[0].textContent);
	var number_likes = e.getElementsByTagName("p")[0].textContent;

	//Requests API
	var requests = new XMLHttpRequest();
	requests.withCredentials;
	requests.open("POST", "https://pocketinnocity.cf/api/like.php", true);
	requests.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	//Construct params
	var params = "title={0}&content={1}&like={2}".replaceAll("{0}", title).replaceAll("{1}", content);

	//Check classname
	if (e.className == "dislike")
	{
		//Envoie de la requete
		requests.send(params.replaceAll("{2}", "true"));
		number_likes = parseInt(number_likes) + 1;
	}
	else
	{
		//Envoie de la requete
		requests.send(params.replaceAll("{2}", "false"));
		number_likes = parseInt(number_likes) - 1;
	}

	console.log(e);
    e.classList.toggle("like");

}

function toggleFollow(e) {
  e.classList.toggle('follow');
}
