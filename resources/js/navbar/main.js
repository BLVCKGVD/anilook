export class Navbar {
    openNavBar() {
        var x = document.getElementById("myTopnav");
        console.log()
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
}

