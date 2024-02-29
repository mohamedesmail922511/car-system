

var time_remaining = document.querySelectorAll('.time_remaining');
var give_date = document.querySelectorAll('.give_date');
var take_date = document.querySelectorAll('.take_date');


// function to calculate the time
var count = setInterval(function () {
    for (i = 0; i < give_date.length; i++) {
        var index = 0;
        time_remaining.forEach(function (item) {
            // the current time
            var now = new Date().getTime();
            // the difference between time
            var dif = new Date(give_date[index].innerText).getTime() - now;
            var days = Math.floor(dif / (1000 * 60 * 60 * 24));
            var hours = Math.floor((dif % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((dif % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((dif % (1000 * 60)) / 1000);


            if (dif < 0) {
                item.innerHTML = "<h5  class='expired'>تم انتهاء الوقت</h5>"
            }else{
                item.innerHTML =   `<p class="time"> ${days} D - ${hours} H - ${minutes} M - ${seconds} S </p>`;
                // item.innerHTML =   `<p class="">  - ${hours} H - ${days} D  </p>`;
            }
            index++
        })
    }
}, 1000)

count;




