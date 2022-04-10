let a = document.getElementById("age");
let b = document.getElementById("tall");
let c = document.getElementById("poid");
let d = document.getElementById("result");
let e = document.getElementById("submit");

e.addEventListener("click", function () {
    let resultat =
        6.25 * Number(b.value) + 10 * Number(c.value) - 5 * Number(a.value) + 5;
    let f = document.querySelector("#result");
    let h = document.querySelector("#result2");
    let g = document.getElementById("select");
    let n = Number(g.value);
    console.log(n);
    h.value = n * resultat;
    f.value = resultat;
});

let array = [];
array.push("hey");
array.unshift("bonjour");
console.log(array);

array.pop();
console.log(array);
/*
let l = prompt("verifier s'il existe un element");
console.log(l);

const jonas = {
    firstname: "jonas",
    lastname: "navas",
    age: 2021 - 1999,
    job: "teacher",
    friends: ["hamza", "saad", "anas"],
};
if (jonas[l]) {
    console.log("hello");
} else {
    console.log("n'existe pas");
}
jonas.location = "barcelone";
console.log(jonas.location);

*/
var tab = ["hamza", 22, "saad", 17];
let inf = [];
for (let i = 0; i < tab.length; i++) {
    //console.log(`${typeof tab[i]}:${tab[i]}`);
    inf.push(tab[i]);
    inf.push(typeof tab[i]);
}
console.log(inf);

for (let i = 0; i < tab.length; i++) {
    if (typeof tab[i] == "string") {
        console.log(tab[i]);
    }
}
let me = document.getElementById("me");
let you = document.getElementById("you");
let start = document.getElementById("start");
start.addEventListener("click", function () {
    let rand = Math.trunc(Math.random() * 3 + 1);
    let end = document.getElementById("end");

    me.value < rand
        ? (end.innerText = "You Lose!")
        : (end.innerText = "You Win!");
    if (me.value == rand) {
        end.innerText = "You Are Equal!";
    }

    you.innerText = rand;
});
