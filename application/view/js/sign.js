function chkDuplicationId() {
    const id = document.getElementById('u_id');
    const url ="/api/user?u_id="+id.value;
    let apiData = null;

    fetch(url)
    .then(data => {return data.json();})
    .then(apiData => {
        const idspan = document.getElementById('errMsgId')
        if(apiData["flg"]==="1"){
        idspan.innerHTML = apiData["msg"]
        } else {
            idspan.innerHTML = apiData["msg"];
        }
    });

    // console.log(apiData);
}