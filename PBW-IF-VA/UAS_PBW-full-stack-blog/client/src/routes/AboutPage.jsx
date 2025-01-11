import React from "react";

const AboutPage = () => {
  return (
    <div className="bg-gradient-to-b from-blue-900 via-blue-800 to-gray-100 text-gray-100 p-6">
      <div className="max-w-6xl mx-auto bg-gray-50 rounded-lg shadow-lg overflow-hidden">
        {/* Hero Section */}
        <div className="bg-blue-900 text-white p-8">
          <h1 className="text-4xl md:text-5xl font-bold mb-4 text-center">
            Tentang Blog IT Kami
          </h1>
          <p className="text-lg text-center">
            Temukan wawasan, inspirasi, dan panduan praktis seputar dunia
            teknologi bersama kami.
          </p>
        </div>

        {/* Main Content */}
        <div className="p-8 md:p-12 text-gray-900">
          <section className="mb-12">
            <h2 className="text-2xl font-semibold text-blue-700 mb-4">
              Visi Kami
            </h2>
            <p className="text-base leading-relaxed">
              Menjadi sumber utama informasi dan edukasi di bidang IT,
              memberdayakan pembaca untuk berkembang dalam era digital.
            </p>
          </section>

          <section className="mb-12">
            <h2 className="text-2xl font-semibold text-blue-700 mb-4">
              Misi Kami
            </h2>
            <ul className="list-disc list-inside space-y-3">
              <li>
                Menyediakan konten berkualitas yang mudah dipahami oleh pembaca
                dari berbagai latar belakang.
              </li>
              <li>
                Memberikan panduan praktis dan terkini untuk para pengembang,
                desainer, dan pemasar digital.
              </li>
              <li>
                Menjadi inspirasi bagi para profesional IT untuk terus belajar
                dan berinovasi.
              </li>
            </ul>
          </section>

          <section className="mb-12">
            <h2 className="text-2xl font-semibold text-blue-700 mb-4">
              Apa yang Kami Tawarkan?
            </h2>
            <ul className="grid grid-cols-1 md:grid-cols-2 gap-4 list-disc list-inside">
              <li>
                <strong>Web Design:</strong> Panduan desain web modern, tren
                UX/UI, dan alat desain terbaik.
              </li>
              <li>
                <strong>Development:</strong> Tutorial pengembangan aplikasi
                menggunakan berbagai framework terkini.
              </li>
              <li>
                <strong>Search Engine:</strong> Tips SEO untuk meningkatkan
                visibilitas situs Anda di mesin pencari.
              </li>
              <li>
                <strong>Marketing:</strong> Strategi pemasaran digital untuk
                meningkatkan jangkauan dan konversi.
              </li>
            </ul>
          </section>

          <section>
            <h2 className="text-2xl font-semibold text-blue-700 mb-4">
              Tim Pengembang
            </h2>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
              {/* Developer 2 */}
              <div className="bg-gray-200 p-6 rounded-lg shadow-md">
                <img
                  src="/public/deden.jpg"
                  alt="Deden Adi Mardian Lesmana"
                  className="w-24 h-24 mx-auto rounded-full object-cover mb-4"
                />
                <h3 className="text-lg font-semibold">
                  Deden Adi Mardian Lesmana
                </h3>
                <p className="text-gray-600">Pengembang Frontend</p>
              </div>
              {/* Developer 1 */}
              <div className="bg-gray-200 p-6 rounded-lg shadow-md">
                <img
                  src="/public/reniiii.jpg"
                  alt="Reni Kartika Suwandi"
                  className="w-24 h-24 mx-auto rounded-full object-cover mb-4"
                />
                <h3 className="text-lg font-semibold">Reni Kartika Suwandi</h3>
                <p className="text-gray-600">Pengembang Backend</p>
              </div>
              {/* Developer 3 */}
              <div className="bg-gray-200 p-6 rounded-lg shadow-md">
                <img
                  src="/public/kikih.jpg"
                  alt="Kikih Isman Iskandar"
                  className="w-24 h-24 mx-auto rounded-full object-cover mb-4"
                />
                <h3 className="text-lg font-semibold">Kikih Isman Iskandar</h3>
                <p className="text-gray-600">UI/UX Designer</p>
              </div>
            </div>
            <p className="mt-6 text-center text-gray-700">
              Tim kami berasal dari Universitas Sebelas April, siap berbagi ilmu
              dan pengalaman di bidang IT.
            </p>
          </section>
        </div>

        {/* Footer */}
        <div className="bg-blue-900 text-center py-6 text-white">
          <p className="text-sm">&copy; 2025 Blog IT. Semua Hak Dilindungi.</p>
        </div>
      </div>
    </div>
  );
};

export default AboutPage;
