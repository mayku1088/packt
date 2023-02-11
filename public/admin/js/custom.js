function showWaiting(){
	waitingDialog.show('Please wait');
}

function hideWaiting(){
	waitingDialog.hide();
}

function setLocalStorage(key, value){
    localStorage.setItem(key, value);
}

function getLocalStorage(key){
    return localStorage.getItem(key);
}