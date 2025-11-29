import { useState } from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import { XMarkIcon } from "@heroicons/react/24/outline";
import './Login.css';

export const AuthPanel = ({ show, closePanel }) => {
  const [isLogin, setIsLogin] = useState(true);

  return (
    // Only overlay behind the right-side panel
    <div
      className={`fixed top-0 right-0 h-full w-full z-50 transition-transform duration-300
        ${show ? "translate-x-0" : "translate-x-full"} flex`}
    >
      {/* Semi-transparent background just behind the panel */}
      <div
        className="w-full h-full bg-black/30"
        onClick={closePanel} // click on background closes panel
      ></div>

      {/* Slide-in panel */}
      <div
        className="relative w-96 h-full  shadow-2xl flex justify-center items-center p-6"
        style={{ background: 'linear-gradient(145deg, #F1F4FA, #CBCDD3)' }}
        onClick={(e) => e.stopPropagation()} // prevent closing when clicking inside
      >
        {/* X button at top-right inside panel */}
        <button
          onClick={closePanel}
          className="absolute top-4 right-4 text-gray-600"
        >
          <XMarkIcon className="h-7 w-7" />
        </button>

        {isLogin ? (
          <LoginForm switchToSignUp={() => setIsLogin(false)} closePanel={closePanel} />
        ) : (
          <SignUpForm switchToLogin={() => setIsLogin(true)} closePanel={closePanel} />
        )}
      </div>
    </div>
  );
};

// ---------- Login Form ----------
const LoginForm = ({ switchToSignUp, closePanel }) => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError("");

    try {
      const response = await axios.post("http://localhost:8000/api/login", { email, password });

      localStorage.setItem("user", JSON.stringify(response.data.user));
      localStorage.setItem("token", response.data.token);

      setEmail("");
      setPassword("");
      setError("");
      closePanel(); // hide panel
      navigate("/");
    } catch (err) {
      setError(err.response?.data?.message || "Login failed");
    }
  };

  return (
    <form className="auth-form" onSubmit={handleSubmit}>
      <span className="title">Sign In</span>
      {error && <p className="text-red-500">{error}</p>}
      <input type="email" placeholder="Email Address" value={email} onChange={(e) => setEmail(e.target.value)} />
      <input type="password" placeholder="Password" value={password} onChange={(e) => setPassword(e.target.value)} />
      <div className="button">
        <input type="submit" value="Login" className="submit" />
        <span className="rip1"></span>
        <span className="rip2"></span>
      </div>
      <div className="links">
        <a onClick={switchToSignUp}>Sign up</a>
        <a href="#">Forgot your password?</a>
      </div>
    </form>
  );
};

// ---------- SignUp Form ----------
const SignUpForm = ({ switchToLogin, closePanel }) => {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError("");

    try {
      const response = await axios.post("http://localhost:8000/api/register", { name, email, password });

      localStorage.setItem("user", JSON.stringify(response.data.user));
      localStorage.setItem("token", response.data.token);

      setName("");
      setEmail("");
      setPassword("");
      setError("");
      closePanel();
      navigate("/");
    } catch (err) {
      setError(err.response?.data?.message || "Registration failed");
    }
  };

  return (
    <form className="auth-form" onSubmit={handleSubmit}>
      <span className="title">Sign Up</span>
      {error && <p className="text-red-500">{error}</p>}
      <input type="text" placeholder="Full Name" value={name} onChange={(e) => setName(e.target.value)} />
      <input type="email" placeholder="Email Address" value={email} onChange={(e) => setEmail(e.target.value)} />
      <input type="password" placeholder="Password" value={password} onChange={(e) => setPassword(e.target.value)} />
      <div className="button">
        <input type="submit" value="Sign Up" className="submit" />
        <span className="rip1"></span>
        <span className="rip2"></span>
      </div>
      <div className="links">
        <a onClick={switchToLogin}>Back to Login</a>
      </div>
    </form>
  );
};
