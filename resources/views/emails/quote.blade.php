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
    <p><strong>Help Required:</strong> {{ $help_require }}</p>
    <p><strong>Class Duration:</strong> {{ $class_duration ?? 'N/A' }}</p>
    <p><strong>Test Description:</strong> {{ $test_details ?? 'N/A' }}</p>
    <p><strong>Assignment Instructions:</strong> {{ $assignment_instructions ?? 'N/A' }}</p>
    <p><strong>Academic Level:</strong> {{ $academic_level ?? 'N/A' }}</p>
    <p><strong>MML Details:</strong> {{ $mml_details ?? 'N/A' }}</p>
    <p><strong>Discussion Board Question:</strong> {{ $discussion_board_question ?? 'N/A' }}</p>
    <p><strong>Phone:</strong> {{ $phone_number ?? 'N/A' }}</p>
    <p><strong>Discount Code:</strong> {{ $discount_code ?? 'N/A' }}</p>
</body>
</html>