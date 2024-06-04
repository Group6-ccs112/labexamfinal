import React, { useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

const Home = ({ isAuthenticated }) => {
  const navigate = useNavigate();

  // Use useEffect to handle navigation based on authentication
  useEffect(() => {
    if (isAuthenticated === '') {
      navigate('/login');
    }
  }, [isAuthenticated]); // Add isAuthenticated as a dependency

  // If authenticated, render the homepage
  return (
    <div>
      <h1>Welcome to the Admin Homepage</h1>
    </div>
  );
};

export default Home;
