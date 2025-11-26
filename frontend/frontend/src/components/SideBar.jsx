import React from "react";

export default function SideBar() {
  const colors = [
    { id: 1, name: "Red", hex_code: "#FF0000" },
    { id: 2, name: "Blue", hex_code: "#0000FF" },
    { id: 3, name: "Green", hex_code: "#00FF00" },
    { id: 4, name: "Black", hex_code: "#000000" },
  ];

  return (
    <aside className="w-64 bg-white p-5 shadow-xl rounded-2xl h-fit sticky top-5">
      <h2 className="text-xl font-semibold mb-4">Filters</h2>

      {/* Price Range */}
      <div className="mb-6">
        <h3 className="font-medium mb-2">Price</h3>
        <input type="range" min="0" max="1000" className="w-full" />
      </div>

      {/* Colors */}
      <div className="mb-6">
        <h3 className="font-medium mb-2">Colors</h3>
        <div className="grid grid-cols-4 gap-3">
          {colors.map((color) => (
            <div key={color.id} className="flex flex-col items-center text-center text-sm">
              <span
                className="w-7 h-7 rounded-full border"
                style={{ backgroundColor: color.hex_code }}
              ></span>
              <span className="mt-1">{color.name}</span>
            </div>
          ))}
        </div>
      </div>

      {/* Categories */}
      <div className="mb-6">
        <h3 className="font-medium mb-2">Category</h3>
        <select className="w-full border rounded-lg p-2">
          <option>All</option>
          <option>T-Shirts</option>
          <option>Shoes</option>
          <option>Accessories</option>
        </select>
      </div>

      {/* Gender */}
      <div className="mb-6">
        <h3 className="font-medium mb-2">Gender</h3>
        <div className="space-y-2 text-sm">
          <label className="flex items-center gap-2">
            <input type="checkbox" /> Male
          </label>
          <label className="flex items-center gap-2">
            <input type="checkbox" /> Female
          </label>
          <label className="flex items-center gap-2">
            <input type="checkbox" /> Unisex
          </label>
        </div>
      </div>

      <button className="w-full bg-[#ff6a00] text-white py-2 rounded-xl font-medium mt-3">
        Apply Filters
      </button>
    </aside>
  );
}