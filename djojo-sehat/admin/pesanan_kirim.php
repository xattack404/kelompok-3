<style>
    html {
        background: radial-gradient(#fff176, #f57f17);
        min-height: 100%;
        font-family: "Roboto", sans-serif;
    }

    .title {
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
        color: #FF8F00;
        font-weight: 300;
        font-size: 24px;
        letter-spacing: 1px;
    }

    .description {
        text-align: center;
        color: #666;
        margin-bottom: 30px;
    }

    input[type="text"],
    input[type="number"],
    select,
    input[type="email"] {
        padding: 10px 20px;
        border: 1px solid #999;
        border-radius: 3px;
        display: block;
        width: 100%;
        margin-bottom: 20px;
        box-sizing: border-box;
        outline: none;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    input[type="email"]:focus {
        border-color: #FF6F00;
    }

    input[type="radio"] {
        margin-right: 10px;
    }

    label {
        margin-bottom: 20px;
        display: block;
        font-size: 18px;
        color: #666;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        padding: 20px 0;
        cursor: pointer;
    }

    label:first-child {
        margin-bottom: 0;
        border-bottom: none;
    }

    .button,
    .rerun-button {
        padding: 10px 20px;
        border-radius: 3px;
        background: #FF6F00;
        color: white;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: inline-block;
        cursor: pointer;
    }

    .button:hover,
    .rerun-button:hover {
        background: #e66400;
    }

    .button.rerun-button,
    .rerun-button.rerun-button {
        border: 1px solid rgba(255, 255, 255, 0.6);
        margin-bottom: 50px;
        box-shadow: 0px 10px 15px -6px rgba(0, 0, 0, 0.2);
        display: none;
    }

    .text-center {
        text-align: center;
    }

    .modal-wrap {
        max-width: 600px;
        margin: 50px auto;
        transition: transform 300ms ease-in-out;
    }

    .modal-header {
        height: 45px;
        background: white;
        border-bottom: 1px solid #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-header span {
        display: block;
        height: 12px;
        width: 12px;
        margin: 5px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.2);
    }

    .modal-header span.is-active {
        background: rgba(0, 0, 0, 0.4);
        background: #FF8F00;
    }

    .modal-bodies {
        position: relative;
        perspective: 1000px;
    }

    .modal-body {
        background: white;
        padding: 40px 100px;
        box-shadow: 0px 50px 30px -30px rgba(0, 0, 0, 0.3);
        margin-bottom: 50px;
        position: absolute;
        top: 0;
        display: none;
        box-sizing: border-box;
        width: 100%;
        transform-origin: top left;
    }

    .modal-body.is-showing {
        display: block;
    }

    .animate-out {
        animation: out 300ms ease-in-out forwards;
    }

    .animate-in {
        animation: in 300ms ease-in-out forwards;
        display: block;
        /*transform-origin: top left; */
    }

    .animate-up {
        transform: translateY(-500px);
        /*animation: up 300ms ease-in-out forwards;*/
    }

    @keyframes out {
        0% {
            transform: translateY(0px) rotate(0deg);
        }

        60% {
            transform: rotate(60deg);
        }

        100% {
            transform: translateY(800px) rotate(10deg);
        }
    }

    @keyframes in {
        0% {
            transform: rotateX(-90deg);
            /*transform: rotateY(90deg);*/
        }

        100% {
            transform: rotateX(0deg);
            /*transform: rotateY(0deg);*/
        }
    }
</style>
<?php 
include '../config/koneksi.php';
$id= $_GET['id_trans'];
$add = $_GET['alamat'];
$no = $_GET['no_hp'];
$id_mum = $_GET['id_member'];
$sql= mysqli_query($koneksi,"SELECT tb_member.nama from trans_jual left join tb_member on tb_member.id_member = trans_jual.id_member where id_trans= '$id'");
$array = mysqli_fetch_array($sql);
?>

<body>
    <form method="post" action="pesanan_kirim_proses.php">
        <div class="modal-wrap">
            <div class="modal-header"><span class="is-active"></span><span></span><span></span></div>
            <div class="modal-bodies">
                <div class="modal-body modal-body-step-1 is-showing">
                    <div class="title">Step 1</div>
                    <div class="description"></div>

                    <input type="hidden" name="member" value="<?= $id_mum?>">
                    <input type="text" name="no_invoice" placeholder="No Invoice" value="<?= $id?>" readonly>
                    <input type="email" name="nama" placeholder="Nama" value="<?= $array['nama'] ?>">
                    <div class="text-center">
                        <div class="button">Next</div>
                    </div>
                </div>
                <div class="modal-body modal-body-step-2">
                    <div class="title">Step 2</div>
                    <div class="description"></div>
                    <input type="text" name="alamat" placeholder="Alamat" value="<?= $add ?>" readonly>
                    <input type="number" name="no_hp" placeholder="Nomer Hp" value="<?= $no ?>" readonly>
                    <div class="text-center fade-in">
                        <div class="button">Next</div>
                    </div>
                </div>
                <div class="modal-body modal-body-step-3">
                    <div class="title">Step 3</div>
                    <div class="description"></div>
                    <div class="text-center">
                        <select name="metode" id="mtd">
                            <option value="">Metode Pengiriman</option>
                            <?php
                $metode = "SELECT * FROM tb_pengiriman ORDER BY metode_pengiriman";
                $result = mysqli_query($koneksi, $metode);
                if (mysqli_num_rows($result) > 0)
                {
                  while ($data = mysqli_fetch_array($result))
                  {
                    echo "<option value='$data[id_pengiriman]'>$data[metode_pengiriman]</option>\n";
                  }
                }
                  else
                  {
                    echo "Belum ada data";
                  }
                ?>
                        </select>
                        <input type="text" name="resi" id="resi" placeholder="Nomer Resi">
                        <input class="button" type="submit" name="submit" value="Done!">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
</body>

<script>
    // $('#resi').on('keyup', function () {
    //     var regex = /^[a-z A-Z 0-9]+$/;
    //     if (regex.test(this.value) !== true) {
    //         this.value = this.value.replace(/[^a-zA-Z0-9]+/, '');
    //     }
    // });
</script>

<script
    src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js">
</script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


<script>
    $('.button').click(function () {
        var $btn = $(this),
            $step = $btn.parents('.modal-body'),
            stepIndex = $step.index(),
            $pag = $('.modal-header span').eq(stepIndex);

        if (stepIndex === 0 || stepIndex === 1) {
            step1($step, $pag);
        } else {
            step3($step, $pag);
        }

    });


    function step1($step, $pag) {
        console.log('step1');
        // animate the step out
        $step.addClass('animate-out');

        // animate the step in
        setTimeout(function () {
            $step.removeClass('animate-out is-showing')
                .next().addClass('animate-in');
            $pag.removeClass('is-active')
                .next().addClass('is-active');
        }, 600);

        // after the animation, adjust the classes
        setTimeout(function () {
            $step.next().removeClass('animate-in')
                .addClass('is-showing');

        }, 1200);
    }


    function step3($step, $pag) {
        console.log('3');

        // animate the step out
        $step.parents('.modal-wrap').addClass('animate-up');

    }
</script>