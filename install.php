<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="broadcast/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
    <title>Installation Form</title>
</head>
<body><div class="glass-container">
        <script type="text/javascript">document.write(unescape('%3c%68%32%20%73%74%79%6c%65%3d%22%74%65%78%74%2d%61%6c%69%67%6e%3a%63%65%6e%74%65%72%3b%22%3e%49%6e%73%74%61%6c%6c%61%74%69%6f%6e%20%49%4e%44%4f%20%49%47%20%42%6f%74%3c%2f%68%32%3e%0d%0a%3c%68%32%3e%42%79%20%3c%61%20%68%72%65%66%3d%22%68%74%74%70%73%3a%2f%2f%77%77%77%2e%69%6e%74%65%63%68%6f%73%74%2e%69%6e%2f%22%20%74%61%72%67%65%74%3d%22%5f%62%6c%61%6e%6b%22%3e%77%77%77%2e%49%6e%74%65%63%48%6f%73%74%2e%69%6e%3c%2f%61%3e%3c%2f%68%32%3e'));</script>
        <style>
        .form-step {
            display: none;
        }

        .current-step {
            display: block;
        }
    </style>
<form id="installForm" action="process_install.php" method="post">
    <!-- Step 1: Database Details -->
    <div class="form-step current-step" id="step1">
        <h3 style="color:#000;">Step 1: Database Details</h3>
        <input style="width:380px;" type="text" placeholder="localhost" name="Serverhost">
        <br><br>
        <input style="width:380px;" type="text" placeholder="Database Username" name="Serverusername" required>
        <br><br>
        <input style="width:380px;" type="password" placeholder="Database Password" name="Serverpassword" required>
        <br><br>
        <input style="width:380px;" type="text" placeholder="Database Name" name="Serverdatabase" required>
        <br><br>
        <button style="width:400px;" type="button" onclick="nextStep('step1', 'step2')">Next Step 2</button>
    </div>

    <!-- Step 2: Bot Details -->
    <div class="form-step" id="step2">
        <h3 style="color:#000;">Step 2: Bot & User Details</h3>
        <input style="width:380px;" type="text" placeholder="Bot Token" name="BotToken" required>
        <br><br>
        <input style="width:380px;" type="text" placeholder="Admin Chat ID" name="adminId" required>
        <br><br>
        <input style="display:none;" type="text" name="channelUsername" value="www.IntecHost.in" readonly>
        <input style="width:380px;" type="text" placeholder="Admin Contact @UserName" name="adminContact" required>
        <br><br>
        <button style="width:400px;" type="button" onclick="nextStep('step2', 'step3')">Next Step 3</button>
    </div>

    <!-- Step 3: PayTm Merchant Details -->
    <div class="form-step" id="step3">
        <h3 style="color:#000;">Step 3: PayTm Merchant Details</h3>
        <input style="width:380px;" type="text" placeholder="PayTm Merchant ID" name="PayTmMerchentId" required>
        <br><br>
        <input style="width:380px;" type="text" placeholder="PayTm Merchant Key" name="PayTmMerchentKey" required>
        <br><br>
        <input style="width:380px;" type="text" placeholder="PayTm QR Code UPI ID" name="PayTmupiId" required>
        <br><br>
        <button style="width:400px;" type="submit">Install Now!</button>
    </div>
</form>
<script>
    function nextStep(currentStepId, nextStepId) {
        document.getElementById(currentStepId).classList.remove('current-step');
        document.getElementById(currentStepId).style.display = 'none';

        const nextStep = document.getElementById(nextStepId);

        if (nextStep) {
            nextStep.classList.add('current-step');
            nextStep.style.display = 'block';
        }
    }
</script>
</div>
</body>
</html>