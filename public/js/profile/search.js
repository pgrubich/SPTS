

var searchButton = document.getElementById("search-button");
searchButton.addEventListener('click',search,false);
function search()
{
    var inputValue = document.getElementById("inputValue").value;

    var xhr = new XMLHttpRequest();                 // Utworzenie obiektu XMLHttpRequest.
    xhr.onload = function() 
    {                       // Po zmianie stanu.
      if(xhr.status === 200) 
      {                      // Jeżeli stan serwera wskazuje, że wszystko jest w porządku.
        responseObject = JSON.parse(xhr.responseText);
        if(typeof responseObject !== 'undefined' && responseObject.length > 0)
        {
            var newContent = '';
            for (var i = 0; i < responseObject.length; i++) // Iteracja przez obiekt.
            { 
              newContent += '<p>'+" " + responseObject[i].id+" " + responseObject[i].name +" "+ responseObject[i].surname+'</p>';
            }
            document.getElementById('search-result').innerHTML = newContent;  // Uaktualnienie strony nową zawartością.
        }else{
            document.getElementById('search-result').innerHTML = "<p>brak wyników wyszukiwania</p>";
        }


      }
}
if(inputValue)
{
    xhr.open('GET', 'search/'+inputValue, true);        // Przygotowanie żądania.
    xhr.send(null); 
}else
{
    document.getElementById('search-result').innerHTML = "<p>Wypełnij polę wyszukiwania.</p>";
}


}
    

   
