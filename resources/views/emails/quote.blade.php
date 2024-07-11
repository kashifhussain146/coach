<!DOCTYPE html>
<html>
<head>
    <title>Quote Request</title>
</head>
<body>
<h2>New Quote Request</h2>
    <p><strong>Name:</strong> {{ $full_name }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Help Required:</strong> {{ $helpRequire }}</p>
    <p><strong>Class Duration:</strong> {{ $classDuration ?? 'N/A' }}</p>
    <p><strong>Test Description:</strong> {{ $testdiscription ?? 'N/A' }}</p>
    <p><strong>Instructions:</strong> {{ $instructions ?? 'N/A' }}</p>
    <p><strong>Academic Level:</strong> {{ $academicLevel ?? 'N/A' }}</p>
    <p><strong>MML Details:</strong> {{ $mmlDetails ?? 'N/A' }}</p>
    <p><strong>Discussion Question:</strong> {{ $discussionQuestion ?? 'N/A' }}</p>
    <p><strong>Phone:</strong> {{ $phone ?? 'N/A' }}</p>
    <p><strong>Discount Code:</strong> {{ $discount_code ?? 'N/A' }}</p>
</body>
</html>