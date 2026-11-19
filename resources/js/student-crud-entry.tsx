import { createRoot } from 'react-dom/client';
import StudentCrud from './components/student-crud';

const mountElement = document.getElementById('student-crud-root');

if (mountElement) {
    createRoot(mountElement).render(<StudentCrud />);
}
