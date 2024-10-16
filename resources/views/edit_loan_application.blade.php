<style>
    .form-container {
        background-color: #3b82f6; /* Blue background for the form */
        border-radius: 8px; /* Rounded corners */
        padding: 20px; /* Spacing inside the box */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        color: white; /* Text color */
    }

    .form-container input,
    .form-container button {
        border-radius: 4px; /* Rounded corners for inputs and buttons */
    }

    .form-container input {
        background-color: #1e3a8a; /* Darker blue for input */
        border: 1px solid #3b82f6; /* Match border with background */
        color: white; /* Input text color */
        padding: 10px; /* Padding inside the inputs */
        margin-bottom: 10px; /* Spacing between inputs */
        width: 100%; /* Full width for inputs */
    }

    .form-container input::placeholder {
        color: #d1d5db; /* Light placeholder color */
    }

    .form-container button {
        background-color: #f59e0b; /* Button background color */
        color: white; /* Button text color */
        padding: 10px; /* Padding inside button */
        border: none; /* Remove border */
        cursor: pointer; /* Pointer on hover */
        transition: background-color 0.3s; /* Smooth transition */
    }

    .form-container button:hover {
        background-color: #d97706; /* Darker color on hover */
    }
</style>

<div class="flex justify-center mb-6">
    <h1 class="text-2xl font-bold text-white">Update Loan Application</h1>
</div>

<div class="form-container">
    <form action="{{ route('loan.update', $loanApplication->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ $loanApplication->name }}" placeholder="Name" required>
        <input type="email" name="email" value="{{ $loanApplication->email }}" placeholder="Email" required>
        <input type="text" name="tel" value="{{ $loanApplication->tel }}" placeholder="Phone" required>
        <input type="text" name="occupation" value="{{ $loanApplication->occupation }}" placeholder="Occupation" required>
        <input type="number" name="monthly_salary" value="{{ $loanApplication->monthly_salary }}" placeholder="Monthly Salary" required>
        <input type="file" name="paysheet" accept="application/pdf">
        <button type="submit">Update Loan Application</button>
    </form>
</div>
