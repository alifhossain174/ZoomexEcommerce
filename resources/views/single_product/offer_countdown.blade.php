@if ($product->special_offer == 1 && $product->offer_end_time > date('Y-m-d H:i:s'))
    <span id="countdown<?= $product->id ?>" style="font-size: 12px; color: var(--secondary-color);"></span>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var endDate = new Date('<?= $product->offer_end_time ?>').getTime();

            var countdownTimer = setInterval(function() {

                var now = new Date().getTime();
                var timeLeft = endDate - now;

                var days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                var countdownElement = document.getElementById("countdown<?= $product->id ?>");

                if (countdownElement) {
                    countdownElement.innerHTML = "<i class='far fa-clock'></i> " + days + "d " + hours +
                        "h " + minutes + "m " + seconds + "s ";
                }

                if (timeLeft < 0) {
                    clearInterval(countdownTimer);
                    if (countdownElement) {
                        countdownElement.innerHTML = "Offer expired";
                    }
                }

            }, 1000);
        });
    </script>
@endif
