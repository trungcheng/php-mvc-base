<link rel="stylesheet" href="<?= $host_name ?>/public/css/myLeave.css">
<link rel="stylesheet" href="<?= $host_name ?>/public/css/navbar.css">

<div class="content">
    <div class="content-header">
        <div class="header">
            <h1 class="heading">my leave</h1>
            <div class="button-list">
                <p class="btn1 js-leave-his" id="btn-leave">leave history</p>
                <p class="btn2 js-summary">summary</p>
            </div>
        </div>
    </div>
    <div class="content-body leave-history" id="content-body">
        <div class="js-modal-contain">
            <h4 class="search-leavinf">search leave information</h4>
            <form id="form-leave-history" action="" method="get" onsubmit="return false;">
                <div class="content-body-leave">
                    <div class="leave-from">
                        <p>leave from</p>
                        <input type="date" name="leave_from">
                    </div>

                    <div class="leave-to">
                        <p>leave to</p>
                        <input type="date" name="leave_to">
                    </div>

                    <div class="leave-type">
                        <p>leave type</p>
                        <select id="leave-type" name="leave_type">
                            <option value="0">all new types</option>
                            <option value="1">annual leave</option>
                            <option value="2">personal leave</option>
                            <option value="3">compensation leave</option>
                            <option value="4">sick leave (non-paid)</option>
                            <option value="5">non-paid leave</option>
                            <option value="6">maternity leave (non-paid)</option>
                            <option value="7">engagement ceremony</option>
                            <option value="8">relative funeral leave</option>
                            <option value="9">wedding leave</option>
                        </select>
                    </div>
                </div>

                <div class="show-leave-status">
                    <p>show leave with status</p>
                    <div class="squarecheck">
                        <label for="squarecheck2">accepted</label>
                        <input type="checkbox" name="leave_status" value="Accepted" id="squarecheck2">
                    </div>
                    <div class="squarecheck">
                        <label for="squarecheck3">rejected</label>
                        <input type="checkbox" name="leave_status" value="Rejected" id="squarecheck3">
                    </div>
                    <div class="squarecheck">
                        <label for="squarecheck4">cancelled</label>
                        <input type="checkbox" name="leave_status" value="Cancelled" id="squarecheck4">
                    </div>
                    <div class="squarecheck">
                        <label for="squarecheck5">pending approval</label>
                        <input type="checkbox" name="leave_status" value="Pending" id="squarecheck5">
                    </div>
                    <div class="squarecheck">
                        <label for="squarecheck6">draft</label>
                        <input type="checkbox" name="leave_status" value="Draft" id="squarecheck6">
                    </div>
                </div>

                <div class="func-button">
                    <button type="submit" class="btn">search</button>
                    <button type="reset" class="btn">reset all</button>
                </div>
            </form>

            <div id="root"></div>
        </div>
    </div>

    <div class="content-body summary">
        <div class="js-modal-contain">
            <select name="year" id="year">
                <option value="2022">by 2022</option>
                <option value="2023">by 2023</option>
                <option value="2024">by 2024</option>
                <option value="2025">by 2025</option>
                <option value="2026">by 2026</option>
            </select>
            <table>
                <tr>
                    <th>leave type</th>
                    <th>total day(s)</th>
                    <th>token day(s)</th>
                    <th>remaining days</th>
                </tr>
                <tr>
                    <td>annual leave</td>
                    <td>16</td>
                    <td>2</td>
                    <td>14</td>
                </tr>
                <tr>
                    <td>personal leave</td>
                    <td>6</td>
                    <td>1</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>sick leave (Non-paid)</td>
                    <td>30</td>
                    <td>0</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>non-paid leave</td>
                    <td>30</td>
                    <td>0</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>maternity leave (Non-paid)</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>engagement ceremony</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>relative funeral leave</td>
                    <td>3</td>
                    <td>0</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>wedding leave</td>
                    <td>3</td>
                    <td>0</td>
                    <td>3</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
    require_once "./src/views/content/UC010/modal.php"
?>

<script>
    const id_user   = <?= $_SESSION["id"] ?>;
    const api_uc010 = "<?= $api_uc010 ?>";
    const host_name = "<?= $host_name ?>";
</script>

<script src="<?= $host_name ?>/public/js/uc010/leave_manage.js"></script>