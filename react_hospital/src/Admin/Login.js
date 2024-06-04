import React, { useState } from 'react';
import axios from 'axios';
import { Link, useNavigate } from 'react-router-dom'; // Import useNavigate

const Login = ({ setIsAuthenticated }) => {
  const [error, setError] = useState(''); // Keep state for error message
  const navigate = useNavigate(); // Utilize useNavigate hook

  const handleLogin = async (e) => {
    e.preventDefault();

    // Get form data
    const email = e.target.elements.email.value;
    const password = e.target.elements.password.value;

    try {
      const response = await axios.post('http://127.0.0.1:8000/api/login', { email, password });
      // If the request is successful, set isAuthenticated and navigate to home
      setIsAuthenticated(response.data.user || email); // Assuming response contains user data
      setError(''); // Clear any previous errors
      navigate('/'); // Navigate to home page (replace '/' with your actual home route)
    } catch (error) {
      // If there's an error, set the error message
      setError(error.response.data.message);
    }
  };

  return (
    <div>
      <h2>Login</h2>
      {error && <p>{error}</p>}
      <form onSubmit={handleLogin}>
        <input type="email" placeholder="Email" name="email" />
        <input type="password" placeholder="Password" name="password" />
        <button type="submit">Login</button>
      </form>
      <p>Don't have an account? <Link to="/register">Register here</Link>.</p>
    </div>
  );
};

export default Login;
