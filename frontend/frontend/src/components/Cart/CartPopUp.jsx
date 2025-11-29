import { XMarkIcon } from "@heroicons/react/24/outline";
import axios from "axios";
import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
import "./CartPopUp.css";
export default function CartPopup({ show, closePanel }) {
    const [cart, setCart] = useState([]);
    const navigate = useNavigate();

    const fetchCart = async () => {
        try {
            const res = await axios.get("http://127.0.0.1:8000/api/cart", {
                headers: {
                    Authorization: `Bearer ${localStorage.getItem("token")}`,
                },
            });

            setCart(res.data.data || []); // safe
        } catch (err) {
            console.error(err);
        }
    };

    useEffect(() => {
        if (show) fetchCart();
    }, [show]);

    return (
        <div
            className={`fixed top-0 right-0 h-full w-full z-50 transition-transform duration-300
        ${show ? "translate-x-0" : "translate-x-full"} flex`}
        >
            {/* Background overlay */}
            <div
                className="w-full h-full bg-black/30"
                onClick={closePanel}
            ></div>

            {/* Sliding Cart Panel */}
            <div
                className="relative w-1/3 h-full shadow-2xl flex flex-col p-6"
                style={{
                    background: "linear-gradient(145deg, #F1F4FA, #CBCDD3)",
                }}
                onClick={(e) => e.stopPropagation()}
            >
                {/* Close button */}
                <button
                    onClick={closePanel}
                    className="absolute top-4 right-4 text-gray-600"
                >
                    <XMarkIcon className="h-7 w-7" />
                </button>

                <h2 className="text-2xl font-semibold mb-5">Your Cart</h2>

                {/* Cart Items */}
                <div className="flex-1 overflow-y-auto pr-2">
                    {cart.length === 0 ? (
                        <p className="text-gray-600 mt-4">Cart is empty.</p>
                    ) : (
                        cart.map((item) => (
                            <div key={item.id} className="cart-item-box ">
                                {/* Product Image */}
                                <img
                                    src={`http://127.0.0.1:8000/${item.product.image}`}
                                    alt={item.product.name}
                                    className="w-14 h-14 object-cover rounded-md border"
                                />

                                {/* Product Info */}
                                <div className="flex flex-col flex-grow">
                                    <span className="font-medium text-gray-800">
                                        {item.product.name}
                                    </span>
                                    {/* Price */}
                                    <span className="font-semibold text-gray-800">
                                        ${item.product.price * item.quantity}
                                    </span>
                                </div>
                            </div>
                        ))
                    )}
                </div>

                {/* Footer */}
                <div className="mt-4">
                    <button
                        onClick={() => {
                            closePanel();
                            navigate("/cart");
                        }}
                        className="relative w-full py-2 font-semibold rounded overflow-hidden text-white bg-black submit"
                    >
                        View Cart Details
                        <span className="rip1"></span>
                        <span className="rip2"></span>
                    </button>
                </div>
            </div>
        </div>
    );
}
