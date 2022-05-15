// var info = [{
//     movie_name: "spiderman no way home",
//     tags: ["scifi", "action"],
//     link: "",
//     duration: "2:30",
//     logoimg: "",
//     backimg: "",
//     about: "",
//     cast: [""],
// }]
// let currmovie = document.querySelector('.movies')
// .querySelector('.contain');

// load_movies(info,currmovie);


// function load_movies(list,where){
//     var str=" ";
//     list.forEach(ele => {
//         str +=`<div class="m_item">
//         <div class="img" style="backgroung:url('${ele.logoimg}')">
//         </div>
//         <div class="m_name">${ele.movie_name}</div>
//         </div>`; 

//         // console.log(str,where.innerHTML);
//     });
//     where.innerHTML=str+where.innerHTML;
// }


// for the responsive nav bar
 

 function open_nav(obj){
     let nav = document.querySelector(".nav");
     if(nav.classList.contains("open")){
         obj.style.transform="rotatez(90deg)";
         nav.classList.remove('open');
         nav.classList.add("closee");
     }
     else{
        nav.classList.remove('closee');
        nav.classList.add("open");
        obj.style.transform="rotatez(0deg)";

     }
 }


// for the next and pre button on silde

document.body.addEventListener('click', function (e) {
    if (e.target.classList.contains('pre')) {
        let par = e.target.parentElement;
        par.querySelector('.nxt').style.display = 'block';
        let last = par.lastElementChild;
        let item = last.firstElementChild;
        let I_width = parseInt(getComputedStyle(item).width);
        // console.log(I_width);
        let cur_mar = parseInt(getComputedStyle(last).marginLeft)
        console.log(cur_mar);
        if (cur_mar >= 0) {
            e.target.style.display = 'none';
        }
        else {
            cur_mar += I_width;
            last.style.marginLeft = cur_mar + "px";
        }
        if (cur_mar >= 0) {
            e.target.style.display = 'none';
        }
    }
    else if (e.target.classList.contains('nxt')) {
        let par = e.target.parentElement;
        let main = par.parentElement;
        console.log(main.clientWidth);
        let last = par.lastElementChild;
        let item = last.firstElementChild;
        let I_width = parseInt(getComputedStyle(item).width);
        // console.log(I_width);
        par.querySelector('.pre').style.display = 'block';
        let width = par.scrollWidth;
        let cur_mar = parseInt(getComputedStyle(last).marginLeft)
        cur_mar -= I_width;
        console.log(cur_mar);
        console.log(width);
        last.style.marginLeft = cur_mar + "px";
        if (Math.abs(cur_mar - I_width) >= width) {
            e.target.style.display = 'none';
        }
    }
})

// code for the review section in movies page

function see_review_form(obj) {
    let form = document.querySelector('.add');
    if (obj.classList.contains('rtt')) {
        obj.classList.remove('rtt');
        form.style.height = "0px";
    }
    else {
        form.style.height = "300px";
        obj.classList.add('rtt');
        let add = document.querySelector('.submit');
        // add.disabled = true;
        // add.classList.add('not');
        let name = document.querySelector('.re_name');
        let ar = document.querySelector('.re_con');
        check();
        name.addEventListener('input', check);
        ar.addEventListener('input', check);
        function check() {
            if (name.value != "" && ar.value != "") {
                add.classList.remove('not');
                add.disabled = false;
            }
            else {
                add.classList.add('not');
                add.disabled = true;
            }
        }

        add.addEventListener('click', function () {
            let date = new Date();
            date = date.toString().substr(4, 11);

            let str =
                `<div class="review_item">
            <div class="review_top">
              <div class="review_left">
                <div class="review_name">${name.value}</div>
                <div class="review_date">${date}</div>
              </div>
              <div class="review_rat">
                <i class="fa fa-star" aria-hidden="true" ></i>
                    <i class="fa fa-star" aria-hidden="true" ></i>
                    <i class="fa fa-star" aria-hidden="true" ></i>
                    <i class="fa fa-star" aria-hidden="true" ></i>
                    <i class="fa fa-star-half-o" ></i>
              </div>
            </div>
            <div class="review_con"> ${ar.value}</div>
            </div>`;
            let review = document.querySelector('.review');
            review.innerHTML += str;
            let obj = document.querySelector('.add');
            obj.style.height = "0px";
            let big = document.querySelector('.big');
            big.classList.remove('rtt');
        })
    }


}