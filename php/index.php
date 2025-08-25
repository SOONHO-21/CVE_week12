<?php
echo "<h1>Welcome</h1>";
echo "<p>Try: <a href='/user/alice'>/user/alice</a> (profile.yml)</p>";
echo "<p>Try truncation: <code>/user/alice%2Fsecret.yml%3F</code></p>";
echo "<p>Protected file: <a href='/secret.php'>secret.php</a> (requires login)</p>";
echo "<p>Bypass test: <code>/secret.php%3Faaa.php</code></p>";
?>
