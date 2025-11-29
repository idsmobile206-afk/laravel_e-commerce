import React, { useEffect, useState } from "react";
import axios from "axios";
import { useParams } from "react-router-dom";

export const ProductDetails = () => {
    const { id } = useParams();
    const [product, setProduct] = useState(null);
    const [selectedColor, setSelectedColor] = useState(null);
    const [selectedImages, setSelectedImages] = useState([]);

    useEffect(() => {
        const fetchProduct = async () => {
            try {
                const res = await axios.get(
                    `http://127.0.0.1:8000/api/data/${id}`
                );
                const data = res.data;
                setProduct(data);

                // default selected color = first product color
                const firstColor = data.product_colors?.[0];
                setSelectedColor(firstColor);
                setSelectedImages(firstColor?.images || []);
            } catch (err) {
                console.error("Error fetching product:", err);
            }
        };

        fetchProduct();
    }, [id]);

    if (!product) return <p className="text-center py-10">Loading...</p>;

    return (
        <div className="min-h-screen bg-gray-100 py-10 px-1 lg:px-2">
            <div className="flex flex-col lg:flex-row gap-8">
                {/* Left: Images */}
                <div className="flex-1 grid grid-cols-2 gap-4">
                    {selectedImages
                        .slice(0)
                        .reverse()
                        .map((img) => (
                            <div
                                key={img.id}
                                className="w-full h-[700px] overflow-hidden rounded-lg shadow-lg"
                            >
                                <img
                                    src={`http://localhost:8000/storage/${img.image_path}`}
                                    alt={selectedColor?.color?.name}
                                    className="w-full h-full object-cover"
                                />
                            </div>
                        ))}
                </div>

                {/* Right: Content */}
                <div className="w-full lg:w-[300px] flex flex-col justify-between">
                    <div>
                        <h1 className="text-2xl font-bold">{product.name}</h1>
                        <h2 className="text-lg text-gray-600 mt-1">
                            {product.brand?.name}
                        </h2>
                        <p className="text-gray-800 text-md mt-2">
                            {product.type?.name} / {product.category?.name} /{" "}
                            {product.gender?.name}
                        </p>
                        <p className="text-gray-700 mt-4">
                            {product.description}
                        </p>
                        <p className="text-xl font-semibold mt-4">
                            {product.price} $
                        </p>
                        <p
                            className={`mt-1 font-medium ${
                                product.stock > 0
                                    ? "text-green-600"
                                    : "text-red-600"
                            }`}
                        >
                            {product.stock > 0
                                ? `In Stock: ${product.stock}`
                                : "Out of Stock"}
                        </p>

                        {/* Sizes */}
                        <div className="mt-4">
                            <h3 className="font-semibold mb-2">Sizes:</h3>
                            <div className="flex space-x-2">
                                {product.sizes?.map((size) => (
                                    <span
                                        key={size.id}
                                        className="px-3 py-1 border rounded bg-gray-200 text-sm"
                                    >
                                        {size.name}
                                    </span>
                                ))}
                            </div>
                        </div>

                        {/* Colors */}
                        <div className="mt-4">
                            <h3 className="font-semibold mb-2">Colors:</h3>
                            <div className="flex space-x-2">
                                {product.product_colors?.map((pc) => (
                                    <span
                                        key={pc.id}
                                        style={{
                                            backgroundColor:
                                                pc.color.hex_code || "#000",
                                            outline: "1px solid gray",
                                            outlineOffset: "3px",
                                        }}
                                        className={`w-6 h-6 rounded-full cursor-pointer ${
                                            selectedColor?.id === pc.id
                                                ? "ring-2 ring-black"
                                                : ""
                                        }`}
                                        title={pc.color.name}
                                        onClick={() => {
                                            setSelectedColor(pc);
                                            setSelectedImages(pc.images || []);
                                        }}
                                    ></span>
                                ))}
                            </div>
                        </div>
                        {/* Add to Cart */}
                        <div className="mt-6">
                            <button className="px-6 py-3 bg-black text-white rounded hover:bg-gray-800 w-full">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
