const html = document.documentElement;

if(localStorage.getItem("theme") === "dark") {

    html.classList.add("dark");

}

function toggleTheme() {

    html.classList.toggle("dark");

    if(html.classList.contains("dark")) {

        localStorage.setItem("theme", "dark");

    } else {

        localStorage.setItem("theme", "light");

    }
}