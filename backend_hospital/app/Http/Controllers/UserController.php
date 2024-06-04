<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Register new user
    public function register(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
            'role' => 'required|string|in:admin,doctor,patient'
        ];

        // Validate request data
        $validator = Validator::make($request->all(), $rules);

        // Return validation errors if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        // Return success response
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        // Validation rules (same as before)
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string|min:4',
        ];

        // Validate request data (same as before)
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$user) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // **Security Warning:** Comparing plain text passwords is a security risk. If you haven't hashed passwords during registration, consider implementing password hashing for future registrations to mitigate this risk.

        // Check password match (assuming passwords are stored in plain text)
        if ($request->password !== $user->password) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Return user details (assuming you want to return user information)
        return response()->json(['user' => $user], 200);
    }


    // User logout
    public function logout(Request $request)
    {
        // Revoke access token
        $token = $request->user()->token();
        $token->revoke();

        // Return success response
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    // Get all users
    public function getAllUsers()
    {
        // Get all users from database
        $users = User::all();
        // Return users data
        return response()->json(['users' => $users], 200);
    }

    // Update user details
    public function updateUser(Request $request, $id)
    {
        // Find user by ID
        $user = User::find($id);

        // Return error if user not found
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Update user details
        $user->update($request->all());

        // Return success response
        return response()->json(['message' => 'User updated successfully'], 200);
    }

    // Delete user
    public function deleteUser($id)
    {
        // Find user by ID
        $user = User::find($id);

        // Return error if user not found
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Delete user
        $user->delete();

        // Return success response
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function getUsersByRole($role)
    {
        // Validate role
        $validRoles = ['admin', 'doctor', 'patient'];
        if (!in_array($role, $validRoles)) {
            return response()->json(['message' => 'Invalid role'], 400);
        }

        // Get users by role from the database
        $users = User::where('role', $role)->get();

        // Return users data
        return response()->json(['users' => $users], 200);
    }
}
