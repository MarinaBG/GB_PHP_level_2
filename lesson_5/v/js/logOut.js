class LogOut {
    constructor(){
        this.logOut =  document.querySelector('#log_out');
        this.setEventListener();
    }
    setEventListener(){
        let self = this;

        if(!self.logOut) {
            return;
        }
        self.logOut.addEventListener("click", function(event) {            
            event.preventDefault(); 
            $.removeCookie('name');
            $.removeCookie('login');
            document.location.href = "index.php";
        });
    }
}

let logOut = new LogOut();