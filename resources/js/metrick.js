document.addEventListener('click', function(event){
    let siteUrl       = document.location.host;
    let clientX       = event.clientX;
    let clientY       = event.clientY;
    let date          = new Date();
    let formattedDate = "";
    let hour          = date.getHours();
    formattedDate    += date.getFullYear() + "-";
    formattedDate    += (String(date.getMonth()).length == 1 ? "0" + date.getMonth() : date.getMonth()) + "-";
    formattedDate    += (String(date.getDate()).length == 1 ? "0" + date.getDate() : date.getDate());


    console.log("site : " + siteUrl + ", x: " + clientX + ", y: " + clientY + ", date : " + formattedDate);

    let request_json = JSON.stringify({
        site    : siteUrl,
        clientX : event.clientX,
        clientY : event.clientY,
        date    : formattedDate,
        hour    : hour
    });

    let XHR = ("onload" in new XMLHttpRequest()) ? XMLHttpRequest : XDomainRequest;
    let xhr = new XHR();
    xhr.open("POST", "https://rugbyonetesttask.herokuapp.com/api/metricks", true);
    xhr.send(request_json);
});